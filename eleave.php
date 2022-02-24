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
<style type="text/css">
	table  {
		border:2px solid #aaa;
		border-collapse:collapse;
		background-color:#fff;
		font-family: comic;
		font-size:25px;
	}
	th {
		background-color:#777;
		color:#fff;
		height:32px;
	}
	td {
		border:2px solid #ccc;
		height:120px;
		width:150px;
		text-align:center;
	}
	td.red {
		color:red;
	}
	td.bg-yellow {
		background-color:#ffffe0;
	}
	td.bg-green {
		background-color:#90ee90;
	}
	td.bg-green:hover {
		background-color:#999999;
	}
	td.bg-white {
		background-color:#fff;
	}
    td.bg-white:hover {
		background-color:#999999;
	}
	td.bg-blue {
		background-color:#add8e6;
	}
    td.bg-blue:hover {
		background-color:#999999;
	}
	a {
		color: #333;
		text-decoration:none;
	}
</style>

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
        <li><a href="after_login.php">Back</a></li>    
    </ul>
        </br>
        
<table>
    <?php 
    // Gets today's date
    $date = getdate();

    // Get the value of day, month, year
    $mday = $date['mday'];
    $mon = $date['mon'];
    $wday = $date['wday'];
    $month = $date['month'];
    $year = $date['year'];
    
    //wday = day of the week where 0 = sunday
    //mday = actual day of the month      
    $dayCount = $wday;
    $day = $mday;

    //counting the days before the current day
    while($day > 0) {
        $days[$day--] = $dayCount--;
            if($dayCount < 0)
            $dayCount = 6;
    }

    //checking the last day of the month
    if(checkdate($mon,31,$year))
        $lastDay = 31;
    elseif(checkdate($mon,30,$year))
        $lastDay = 30;
    elseif(checkdate($mon,29,$year))
        $lastDay = 29;
    elseif(checkdate($mon,28,$year))
        $lastDay = 28;

    //counting the days between the current day to the last day
    while($day <= $lastDay) {
        $days[$day++] = $dayCount++;
        if($dayCount > 6)
            $dayCount = 0;
    }	

    // Days to highlight (public holidays)
    $day_to_highlight = array(1,2);

    //printing the header box 
    echo("<tr>");
    echo("<th colspan='7' align='center'>$month $year</th>");
    echo("</tr>");
    echo("<tr>");
	echo("<td class='red bg-yellow'>Sun</td>");
	echo("<td class='bg-yellow'>Mon</td>");
	echo("<td class='bg-yellow'>Tue</td>");
	echo("<td class='bg-yellow'>Wed</td>");
	echo("<td class='bg-yellow'>Thu</td>");
	echo("<td class='bg-yellow'>Fri</td>");
	echo("<td class='bg-yellow'>Sat</td>");
    echo("</tr>");

    //starting the count 
    $startDay = 0;
    $d = $days[1];

    //print out empty cells for the start of the month depending on what day it starts
    echo("<tr>");
    while($startDay < $d) {
        echo("<td></td>");
        $startDay++;
    }

    //whatever dates that are in the array will be printed green, else white
    for ($d=1;$d<=$lastDay;$d++) {
	if (in_array( $d, $day_to_highlight))
		$bg = "bg-green";
	else
		$bg = "bg-white";

    $datetime = new DateTimeImmutable();
    $datetime = $datetime->setDate($year,$date['mon'],$d)->format('d-M-Y');

	// Highlights the current day	
	if($d == $mday)
		echo("<td class='bg-blue'><a href='apply_leave.php?day={$datetime}' title='Detail of day'>$d</a></td>");
	else  
		echo("<td class='$bg'><a href='apply_leave.php?day={$datetime}' title='Detail of day'>$d</a></td>");
    
    //print out empty cells for the end of the month
	$startDay++;
	if($startDay > 6 && $d < $lastDay){
		$startDay = 0;
		echo("</tr>");
		echo("<tr>");
	}
    }
    echo("</tr>");
    ?>
</table>

<div class="menu">
        <?php
            $sql_query = "SELECT * FROM users WHERE username = '" . $_SESSION["username"] . "'";
            $resultset = $db_connection->query($sql_query);
            if ($row = $resultset->fetch_assoc()) 
            if($row['admin_rights'] == 1) {
        ?>
            <a href="add_leave.php">Add Leave</a>
        <?php
            }else{  
        ?>
            
        <?php    
            }
        ?>
    </div>
</body>
</html>