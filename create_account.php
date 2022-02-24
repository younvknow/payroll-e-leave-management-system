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
    <title>Create an account for new user</title>

    <script>
        function check_form() {

            var full_name_check = document.getElementById("full_name").value;
            var nric_check = document.getElementById("nric").value;
            var hpnum_check = document.getElementById("hpnum").value;
            var username_check = document.getElementById("username").value;
            var password_check = document.getElementById("password").value;
            var email_check = document.getElementById("email").value;
            var dob_check = document.getElementById("dob").value;
            var salary_check = document.getElementById("salary").value;

            if (!is_empty(full_name_check) && !is_empty(nric_check) && !is_empty(hpnum_check) && !is_empty(username_check) && !is_empty(password_check) 
            && !is_empty(email_check) && !is_empty(dob_check) && !is_empty(salary_check)) {
                return true;
            } else {
                alert("All the fields are required to be filled in!")
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
    
    <h1>Please create an account for a new user below.</h1>

    <form action ="create_account_action.php" method="post" onsubmit="return check_form();">
        <fieldset>
            <legend><b>Enter required details below</legend></b>
            <label>Full name:</label></br>
            <input type="text" name="full_name" id="full_name"></br></br>
            <label>NRIC:</label></br>
            <input type="text" name="nric" id="nric"></br></br>
            <label>HP Number:</label></br>
            <input type="text" name="hpnum" id="hpnum"></br></br>
            <label>Username:</label></br>
            <input type="text" name="username" id="username"></br></br>
            <label>Password:</label></br>
            <input type="password" name="password" id="password"></br></br>
            <label>Email:</label></br>
            <input type="email" name="email" id="email"></br></br>
            <label>Date of Birth:</label></br>
            <input type="date" name="dob" id="dob"></br></br>
            <label>Salary:</label></br>
            <input type="text" name="salary" id="salary"></br></br>
            <label>Admin rights:</label></br>
            <select name="admin_rights" id="admin_rights">
            <option value="1">Yes</option>
            <option value="0">No</option>
            </select>

            </br></br>
            <input type="submit" value="Submit">
            <input type="reset" value="Clear">
            
    </form>
</body>
</html>