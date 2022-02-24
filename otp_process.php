<?php
$connect = mysqli_connect("localhost","myown_db","myown@12345","myown_db");
include 'functions.php';

$success = "";

if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($connect, "SELECT * FROM otp_check WHERE otp = '" . $_POST["otp"] . "' AND expired!=1 AND NOW() <= DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 1 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($connect, "UPDATE otp_check SET expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;
		header("Location: payslip.php");	
	} else {
		$success = 1; 
		header("Location: otp.php?v=1");
		exit;
	}	
}

?>