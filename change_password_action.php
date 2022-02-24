<?php
session_start();
include 'database_connection.php';
include 'functions.php';

if(isset($_POST['update'])){
    //get POST data
    $old = $_POST['old'];
    $new = $_POST['new'];
    $retype = $_POST['retype'];

	//create a session for the data incase error occurs
	$_SESSION['old'] = $old;
	$_SESSION['new'] = $new;
	$_SESSION['retype'] = $retype;

	//get user details
	$sql_query = " SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'";
	$resultset = $db_connection->query($sql_query);
	$row = $resultset->fetch_assoc();

//check if old password is correct
if(password_verify($old, $row['password'])){

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $new);
$lowercase = preg_match('@[a-z]@', $new);
$number    = preg_match('@[0-9]@', $new);
$specialChars = preg_match('@[^\w]@', $new);

//check if new password match retype
	if($new == $retype){
		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new) < 12) {
			echo 'New password should be at least 12 characters in length and should include at least one upper case letter, one number, and one special character.';
			return false;
		}else{
			echo 'Strong password.';
		}
		//hash our password
		$password = password_hash($new, PASSWORD_DEFAULT);
 
		//update the new password
		$sql_query = "UPDATE users SET password = '$password' WHERE username = '" . $_SESSION["username"] . "'";
		if($db_connection->query($sql_query)){
		$_SESSION['success'] = "Password updated successfully";
			//unset our session since no error occured
			unset($_SESSION['old']);
			unset($_SESSION['new']);
			unset($_SESSION['retype']);
			}
			else{
			$_SESSION['error'] = $db_connection->error;
			}
			}
			else{
			$_SESSION['error'] = "New and retype password did not match";
			}
		    }
		    else{
			$_SESSION['error'] = "Incorrect Old Password";
		    }
	        }
	        else{
		    $_SESSION['error'] = "Input needed data to update first";
	        }
 
	        header('location: change_password.php');
 
?>