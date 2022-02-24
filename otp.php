<?php
include 'check_session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Payroll System</title>

    <script>
        function check_form() {
            var submit_otp = document.getElementById("otp").value;
            
            if (!is_empty(submit_otp)) {
                return true;
            } else {
                alert("OTP cannot be empty!")
                return false;
            }
        }
        function is_empty(text) {
            if (text.trim()=="") {
                return true;
            } else {
                return false;
            }
        }
    </script>

</head>
<body>
    
    <ul>
        <li><a href="logout.php">Log out</a></li>
        
        <?php
            if (isset($_SESSION["username"])) {
        ?>  
            <li><a href="#"><?php echo $_SESSION["username"];?></a></li>
        <?php
            }
            else
            {
        ?>        
            <li><a href="login.php">Log in</a></li>
        <?php
            }
        ?>    
        <li><a href="payroll.php">Back</a></li>
    </ul>

        
        <h1>Check your email for the OTP.</h1>
        <h1>Enter OTP below.</h1>
        <?php 
            if (!empty($_GET["v"]) && $_GET["v"] == "1") {
        ?>   

        <style>
        h2 {
            text-align:center;
            color:red;
        }
        </style>

            <h2><?php echo "Invalid OTP!"; ?></h2>
            
        <?php    
            }
        ?>

    <form action ="otp_process.php" method="post" onsubmit="return check_form();">    

        <table>
		<td><input type="text" name="otp" placeholder="One Time Password" id="otp"></td>
		<td><input type="submit" name="submit_otp" value="Submit"></td>
        </table>

    </form>
    
</body>
</html>