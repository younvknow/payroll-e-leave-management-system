<?php
session_start();
include 'functions.php'; // for cleaning of sql and html
include 'database_connection.php'; // to connect to database

// clean the inputs of username and password
$username = clean_sql($db_connection, $_POST["username"]);
$annual = clean_sql($db_connection, $_POST["annual"]);
$sick = clean_sql($db_connection, $_POST["sick"]);
$childcare = clean_sql($db_connection, $_POST["childcare"]);
$unpaid = clean_sql($db_connection, $_POST["unpaid"]);
$reservist = clean_sql($db_connection, $_POST["reservist"]);

// query username that are already in the db
$check_duplicate_username = "SELECT username FROM applyleave WHERE username = '$username' ";
$result = mysqli_query($db_connection, $check_duplicate_username);
$count = mysqli_num_rows($result);

if($count > 0) {
    echo "<h1>This user already has leaves added!</h1>";
    echo "<a href='add_leave.php'>Back</a>";
    return false;
}

$sql_query = "INSERT INTO applyleave (username, annual, sick, childcare, unpaid, reservist) VALUES ('" . $username . "','" . $annual . "','" . $sick . "','" . $childcare . "'
,'" . $unpaid . "','" . $reservist . "')";

// execute query
$resultset = $db_connection->query($sql_query);

header("Location: after_add_leave.php");

?>