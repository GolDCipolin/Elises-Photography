<?php
session_start();
require_once("protected/connection.php");
?>
<?php
function build_calendar($month, $year){
    $daysOfWeek=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $firstDayOfMonth=mktime(0,0,0, $month, 1, $year);
    $numberDays=date('t', $firstDayOfMonth);
    $dateComponents=getdate($firstDayOfMonth);
    $monthName=$dateComponents['month'];
    $dayOfWeek=$dateComponents['wday'];
    $dateToday=date('Y-m-d');

    $prev_month=date('m', mktime(0,0,0, $month-1, 1, $year));
    $prev_year=date('Y', mktime(0,0,0, $month-1, 1, $year));
    $next_month=date('m', mktime(0,0,0, $month+1, 1, $year));
    $next_year=date('Y', mktime(0,0,0, $month+1, 1, $year));
    $calendar="<center><h2>$monthName $year</h2>";
    $calendar.="<a class='btn btn-primary btn-xs' href='?month=".$prev_month."&year=".$prev_year."'>Prev Month</a> ";
    $calendar.="<a class='btn btn-primary btn-xs' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    $calendar.="<a class='btn btn-primary btn-xs' href='?month=".$next_month."&year=$next_year'>Next Month</a></center>";
    $calendar.="<br><table class='table table-bordered'>";
    $calendar.="<tr>";
    foreach($daysOfWeek as $day){
        $calendar.="<th class='header'>$day</th>";
    }
    return $calendar;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/booking.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">
<?php
require_once("header.php");
?>
<!-- start of base -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                $dateComponents=getdate();
                if(isset($_GET['month']) && isset($_GET['year'])){
                    $month = $_GET['month'];
                    $year=$_GET['year'];
                }else{
                    $month=$dateComponents['mon'];
                    $year=$dateComponents['year'];
                }

                echo build_calendar($month, $year);
            ?>
        </div>
    </div>
</div>
<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->