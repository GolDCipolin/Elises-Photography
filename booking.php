<?php
session_start();
require_once("protected/connection.php");
if(!isset($_SESSION['user_id'])){
    header("location: login.php");
    exit;
}else{
    $email=$_SESSION['email'];
    $user_id=$_SESSION['user_id'];
}//end of if session user id
?>
<?php
    function build_calendar($month, $year){

        // $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        // $sql="SELECT * from form WHERE MONTH(a_date) = ? AND YEAR(a_date) = ?";
        // $res = mysqli_query($conn, $sql);
        // $bookings=array();
        // $count = mysqli_num_rows($res);
        // if($count){
        //     while($row=mysqli_fetch_assoc($res)){
        //         $bookings[]=$row['a_date'];
        //     }
        // }

        //first of all we'll create an array containing names of all days in a week.
        $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

        // What is the first day of the month in question?
        $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

        // How many days does this month contain?
        $numberDays = date('t',$firstDayOfMonth);

        // Retrieve some information about the first day of the
        // month in question.
        $dateComponents = getdate($firstDayOfMonth);

        // What is the name of the month in question?
        $monthName = $dateComponents['month'];

        // What is the index value (0-6) of the first day of the
        // month in question.
        $dayOfWeek = $dateComponents['wday'];

        // Create the table tag opener and day headers 
        $datetoday = date('Y-m-d'); 
        $calendar = "<table class='table table-bordered'>"; 
        $calendar.="<center><h2 class='month'>$monthName $year</h2>"; 
        $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a>";
        $calendar.=" <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
        $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";

        $calendar.="<tr>"; 
        // Create the calendar headers 
        foreach($daysOfWeek as $day) { 
            $calendar.="<th class='header-date'>$day</th>"; 
        } 
        // Create the rest of the calendar
        // Initiate the day counter, starting with the 1st. 
        $currentDay=1;
        $calendar.="</tr><tr>";
        // The variable $dayOfWeek is used to 
        // ensure that the calendar 
        // display consists of exactly 7 columns.
        if($dayOfWeek > 0) { 
            for($k=0;$k<$dayOfWeek;$k++){ 
                $calendar.="<td class='empty'></td>"; 
            } 
        }
        $month = str_pad($month, 2, "0", STR_PAD_LEFT);
        while ($currentDay <= $numberDays) { 
            //Seventh column (Saturday) reached. Start a new row. 
            if ($dayOfWeek == 7) { 
                $dayOfWeek = 0; 
                $calendar.="</tr><tr>"; 
            } 
            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT); 
            $date = "$year-$month-$currentDayRel"; 
            $dayname = strtolower(date('l', strtotime($date))); 
            $eventNum = 0; 
            $today = $date==date('Y-m-d')? "today" : "";
            $today=$date==date('Y-m-d')? "today" : "";
            if($date<date('Y-m-d')){
                $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
            // }elseif(mysqli_fetch_array($date, $bookings)){
            //     $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Already Booked</button>";
            }else{
                $calendar.="<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
            }
            $calendar.="</td>"; 
            //Increment counters 
            $currentDay++; 
            $dayOfWeek++; 
        } 
        //Complete the row of the last week in month, if necessary 
        if ($dayOfWeek != 7) { 
            $remainingDays = 7 - $dayOfWeek; 
            for($l=0;$l<$remainingDays;$l++){ 
                $calendar.="<td class='empty'></td>"; 
            } 
        } 

        $calendar.="</tr>"; 
        $calendar.="</table>";

        echo $calendar;
}

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval=new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }

        $slots[]=$intStart->format("H:iA")." - ".$endPeriod->format("H:iA");
    }

    return $slots;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
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
                    $month=$_GET['month'];
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