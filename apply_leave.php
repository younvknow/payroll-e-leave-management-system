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
        <li><a href="eleave.php">Back</a></li>
    </ul>
    
    </br><fieldset>
    <legend><b>Remaining Leaves</b></legend>
    <?php
    $sql_query = "SELECT * FROM applyleave WHERE username = '" . $_SESSION["username"] . "'";
    $result = $db_connection->query($sql_query);
    if ($row = $result->fetch_assoc()) {
        echo 'Annual Leave: ' . $row["annual"] ;
        echo '<br>';
        echo 'Sick Leave: ' . $row["sick"] ;
        echo '<br>';
        echo 'Childcare Leave: ' . $row["childcare"] ;
        echo '<br>';
        echo 'Unpaid Leave: ' . $row["unpaid"] ;
        echo '<br>';
        echo 'Reservist Leave: ' . $row["reservist"] ;
        echo '<br>';
    }
    ?>  
    
    </fieldset>
    <form action ="apply_leave_action.php" method="post" onsubmit="return check_form();">
    </br><fieldset>
            <legend><b>Apply Leave</legend></b>
            <label>Date of Leave:</label></br>
            <input type="date" name="datefrom" id="datefrom"> <?php echo 'To' ?> <input type="date" name="dateto" id="dateto"></br></br>
            <label>Type of Leave:</label></br>
            <select name="typeofleave" id="typeofleave">
            <option value="Annual">Annual Leave</option>
            <option value="Sick">Sick Leave</option>
            <option value="Childcare">Childcare Leave</option>
            <option value="Unpaid">Unpaid Leave</option>
            <option value="Reservist">Reservist Leave</option>
            </select></br></br>
            <label>Leave day:</label></br>
            <select name="leaveday" id="leaveday">
            <option value="Full day">Full day</option>
            <option value="Half day">Half day</option>
            </select>

            </br></br>
            <input type="submit" value="Submit"> 
        </fieldset>
    </form>
        
    <form action="upload.php" method="post" enctype="multipart/form-data"></br>
        <fieldset>
            <legend><b>Upload MC</legend></b>
            <label>Select image to upload:</label></br></br>
            <input type="file" name="file" id="file"></br></br>
            <input type="submit" value="Upload Image" name="submit">
        </fieldset>
    </form>
    
</body>
</html>