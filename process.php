<?php
include 'functions.php';
include 'database_connection.php';

//OTP generate
$email = clean_sql($db_connection, $_POST["email"]); 
$otp = rand(100000, 999999);
$message = strval($otp);
$to=$_POST['email'];
$subject = "Verify OTP";

//sql query
$sql_query = "INSERT INTO otp_check (otp, expired, create_date) VALUES ('" . $otp . "',0 ,'" . date("Y-m-d H:i:s") . "')";

// execute query
$resultset = $db_connection->query($sql_query);

header("Location: after_create.php");

if (mail($to,$subject,$message)) {
    $_SESSION['email']=$_POST['email'];
    $_SESSION['otp']=$otp;
    header("Location: otp.php");
} else {
    header("Location: payroll.php");
}

?>