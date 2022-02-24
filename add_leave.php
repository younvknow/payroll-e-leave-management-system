<?php
include 'check_session.php';
include 'database_connection.php';
include 'functions.php';
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
            var username_check = document.getElementById("username").value;
            var annual_check = document.getElementById("annual").value;
            var sick_check = document.getElementById("sick").value;
            var childcare_check = document.getElementById("childcare").value;
            var unpaid_check = document.getElementById("unpaid").value;
            var reservist_check = document.getElementById("reservist").value;

            if (!is_empty(username_check) && !is_empty(annual_check) && !is_empty(sick_check) && !is_empty(childcare_check) && !is_empty(unpaid_check)
            && !is_empty(reservist_check)) {
                return true;
            } else {
                alert("All fields have to be filled in!")
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
        <li><a href="eleave.php">Back</a></li>
    </ul>
    <form action ="add_leave_action.php" method="post" onsubmit="return check_form();"></br>
        <fieldset>
            <legend><b>Add Leave for user</legend></b>
            <label>Username:</label></br>
            <input type="text" name="username" id="username"></br></br>
            <label>Annual leave:</label></br>
            <input type="text" name="annual" id="annual"></br></br>
            <label>Sick leave:</label></br>
            <input type="text" name="sick" id="sick"></br></br>
            <label>Childcare leave:</label></br>
            <input type="text" name="childcare" id="childcare"></br></br>
            <label>Unpaid leave:</label></br>
            <input type="text" name="unpaid" id="unpaid"></br></br>
            <label>Reservist leave:</label></br>
            <input type="text" name="reservist" id="reservist"></br></br>

            </br>
            <input type="submit" value="Submit"> 
    </form>

        
</body>
</html>