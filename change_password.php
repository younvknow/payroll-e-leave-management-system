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
    <title>Secure Payroll and E-leave system.</title>

    <script>
        function check_form() {
            var oldPassword = document.getElementById("old").value;
            var newPassword = document.getElementById("new").value;
            var retypePassword = document.getElementById("retype").value;
            
            if (!is_empty(oldPassword) && !is_empty(newPassword) && !is_empty(retypePassword)) {
                return true;
            } else {
                alert("Fields cannot be empty!")
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

    <form method="POST" action="change_password_action.php" onsubmit="return check_form();">
        </br>
    <fieldset>
        <legend><b>Change password</legend></b>
			<label for="old">Old Password:</label>
			<input type="password" name="old" id="old"></br></br>
			<label for="new">New Password:</label>
			<input type="password" name="new" id="new"></br></br>
			<label for="retype">Retype New Password:</label>
			<input type="password" name="retype" id="retype"></br></br>
			<button type="submit" name="update">Update</button>
	</form>

		<?php
			if(isset($_SESSION['error'])){
		?>
			<div class="alert alert-danger text-center" style="margin-top:20px;">
		<?php echo $_SESSION['error']; ?>
			</div>
		<?php
 
			unset($_SESSION['error']);
			}
			if(isset($_SESSION['success'])){
		?>
			<div class="alert alert-success text-center" style="margin-top:20px;">
		<?php echo $_SESSION['success']; ?>
			</div>
		<?php
 
			unset($_SESSION['success']);
			}
		?>

</body>
</html>