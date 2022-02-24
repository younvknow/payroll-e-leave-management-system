<?php
session_start();
if(isset($_SESSION["username"])==false) {
    header("Location: unauthorised.php");
}
?>