<?php
include 'database_connection.php';
include 'functions.php';

// get all input and clean the input
$full_name = clean_sql($db_connection, $_POST["full_name"]);
$nric = clean_sql($db_connection, $_POST["nric"]);
$hpnum = clean_sql($db_connection, $_POST["hpnum"]);
$username = clean_sql($db_connection, $_POST["username"]);
$password = clean_sql($db_connection, $_POST["password"]);
$email = clean_sql($db_connection, $_POST["email"]);
$dob = clean_sql($db_connection, $_POST["dob"]);
$salary = clean_sql($db_connection, $_POST["salary"]);
$admin_rights = clean_sql($db_connection, $_POST["admin_rights"]);

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $_POST["password"]);
$lowercase = preg_match('@[a-z]@', $_POST["password"]);
$number    = preg_match('@[0-9]@', $_POST["password"]);
$specialChars = preg_match('@[^\w]@', $_POST["password"]);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST["password"]) < 12) {
    echo 'Password should be at least 12 characters in length and should include at least one upper case letter, one number, and one special character.';
    return false;
}else{
    echo 'Strong password.';
}

// query username that are already in the db
$check_duplicate_username = "SELECT username FROM users WHERE username = '$username' ";
$result = mysqli_query($db_connection, $check_duplicate_username);
$count = mysqli_num_rows($result);

if($count > 0) {
    echo "<h1>Username already taken. Please enter another username!</h1>";
    echo "<a href='create_account.php'>Back</a>";
    return false;
}

// process password into hashed value
$hashed = password_hash($password , PASSWORD_DEFAULT);

// sql query 
$sql_query = "INSERT INTO users (full_name, nric, hpnum, username, password, email, dob, salary, admin_rights) VALUES ('" . $full_name . "','" . $nric . "','" . $hpnum . "','" 
. $username . "','" . $hashed . "','" . $email . "','" . $dob . "','" . $salary . "','" . $admin_rights . "')";

// execute query
$resultset = $db_connection->query($sql_query);

header("Location: after_create.php");
?>
