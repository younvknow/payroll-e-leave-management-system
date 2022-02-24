<?php
session_start();
include 'functions.php'; // for cleaning of sql and html
include 'database_connection.php'; // to connect to database

// clean the inputs of username and password
$username = clean_sql($db_connection, $_POST["username"]);
$password = clean_sql($db_connection, $_POST["password"]);

// process password into hashed value
$hashed = password_hash($password, PASSWORD_DEFAULT);

$sql_query = "SELECT * FROM users WHERE username = '" . $username . "'";

$resultset = $db_connection->query($sql_query);
$row = $resultset->fetch_assoc();
if ($row && password_verify($_POST['password'] , $row['password'])) {
    //set the session for username
    $_SESSION["username"] = $username;
    //re direct to after log in page
    header("Location: after_login.php");
} else {
    // re direct to unauthorised
    header("Location: unauthorised.php");
}

?>