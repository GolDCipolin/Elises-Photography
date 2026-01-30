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
$sql="SELECT form_id, a_date, a_time, address1 FROM form WHERE `user_ID`=$user_id";
$conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count){
    while($row=mysqli_fetch_assoc($res)){
        $form_id=$row['form_id'];
    }
}
if($form_id==''){
    echo"<script> alert('You have not booked any appointments!');    
    window.location.href='account.php';</script>";
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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">
<?php
require_once("header.php");
?>
<!-- start of base -->
<table class="tbl-full">
    <tr>
        <th>Booking Date</th>
        <th>Booking Time</th>
        <th>Meetup location</th>
    </tr>
    <?php
        $sql="SELECT form_id, a_date, a_time, address1 FROM form WHERE `user_ID`=$user_id";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count){
            while($row=mysqli_fetch_assoc($res)){
                $form_id=$row['form_id'];
                $a_date=$row['a_date'];
                $a_time=$row['a_time'];
                $address1=$row['address1'];
                ?>
                <tr>
                    <td><?php echo $a_date; ?></td>
                    <td><?php echo $a_time; ?></td>
                    <td><?php echo $address1; ?></td>
                    <td>
                        <a href="update-booking.php?id=<?php echo $form_id; ?>" class="btn-secondary">Update Booking</a> <br> <br>
                        <a href="delete-booking.php?id=<?php echo $form_id; ?>" class="btn-danger">Cancel Booking</a>
                    </td>
                </tr>
                <?php
            }
        }
    ?>
</table>
<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->