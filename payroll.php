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
            var email_check = document.getElementById("email").value;
            
            if (!is_empty(email_check)) {
                return true;
            } else {
                alert("Email field has to be filled in!")
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
        <li><a href="after_login.php">Back</a></li>
    </ul>
    
    </br>
    <form action ="process.php" method="post" onsubmit="return check_form();">
    <table>
        <h1>To check your payroll, please enter your email below and you will receive an OTP.</h1>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Submit" class="right">
                <input type="reset" value="Clear" class="right">
            </td>
        </tr>
    </table>
    </form>

</body>
</html>