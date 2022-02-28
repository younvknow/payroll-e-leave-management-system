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
    <title>Payroll System</title>
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
        
        <?php
        $sql_query = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'";

        $resultset = $db_connection->query($sql_query);
        $percentage = 20;
        $allowance = 150;
        if ($row = $resultset->fetch_assoc()) {
            echo 'Full Name : ' . $row['full_name'];
            echo '<br>';
            echo 'Basic Salary : ' . '$' . $row['salary'];
            echo '<br>';
            echo 'Allowance : ' . '$' . $allowance;
            echo '<br>';
            echo 'CPF Deduction : ' . '$' . ($percentage / 100) * $row['salary']; 
            echo '<br>';
            echo 'Salary Credited to Account : ' . '$' . ((int)$row['salary'] - ($percentage / 100) * $row['salary'] + $allowance);
        
        }
        ?>
        
</body>
</html>