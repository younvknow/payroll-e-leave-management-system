<?php
session_start();
include 'check_session.php';
include 'functions.php'; // for cleaning of sql and html
include 'database_connection.php'; // to connect to database

$datefrom = clean_sql($db_connection, $_POST["datefrom"]);
$dateto = clean_sql($db_connection, $_POST["dateto"]);
$typeofleave = clean_sql($db_connection, $_POST["typeofleave"]);
$leaveday = clean_sql($db_connection, $_POST["leaveday"]);

$sql_query = "INSERT INTO applyleave (username, datefrom, dateto, leaveday, type) VALUES ('" . $_SESSION['username'] . "','" . $datefrom . "','" . $dateto . "',
'" . $leaveday . "','" . $typeofleave . "')";
$resultset = $db_connection->query($sql_query);

header("Location: after_apply_leave.php");

?>