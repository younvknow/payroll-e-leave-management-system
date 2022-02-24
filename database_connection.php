<?php
// database details needed for connecting to database
$db_servername = "localhost";
$db_username = "myown_db";
$db_password = "myown@12345";
$db_name = "myown_db";

// perform connection to database
$db_connection = new mysqli($db_servername, $db_username, $db_password, $db_name);

// check connection
if ($db_connection->connect_error)
{
    die("Connection Failed!: " . $db_connection->connect_error);    
}
?>