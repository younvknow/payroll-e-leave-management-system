<?php
include 'check_session.php';
include 'database_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Secure Payroll and E-leave system.</title>
</head>
<body>
    <ul>
        <?php
            if (isset($_SESSION["username"])) {
        ?>  
            <li><a href="logout.php">Log out</a></li>
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
    </ul>
    <div class="menu">
        <?php
            $sql_query = "SELECT * FROM users WHERE username = '" . $_SESSION["username"] . "'";
            $resultset = $db_connection->query($sql_query);
            if ($row = $resultset->fetch_assoc()) 
            if($row['admin_rights'] == 1) {
        ?>
            <a href="payroll.php">Payroll</a>
            <a href="eleave.php">E-leave</a>
            <a href="change_password.php">Change Passsword</a>
            <a href="create_account.php">Create Account</a>
        <?php
            }else{  
        ?>
            <a href="payroll.php">Payroll</a>
            <a href="eleave.php">E-leave</a>
            <a href="change_password.php">Change Passsword</a>
        <?php    
            }
        ?>
    </div>
        
</body>
</html>