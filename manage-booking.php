<?php
session_start();
require_once("protected/connection.php");
if(!isset($_SESSION['account_type'])){
    header('Location:login.php');
    exit;
}else if($_SESSION['account_type'] !== 'staff'){
    header('Location:account.php');
    exit;
}//end of if !isset
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
        <th>User</th>
        <th>Booking Date</th>
        <th>Booking Time</th>
        <th>Meetup location</th>
    </tr>
    <?php
        $sql="SELECT form_id, `user_ID`, a_date, a_time, address1 FROM form";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count){
            while($row=mysqli_fetch_assoc($res)){
                $form_id=$row['form_id'];
                $user_id=$row['user_ID'];
                $a_date=$row['a_date'];
                $a_time=$row['a_time'];
                $address1=$row['address1'];
                ?>
                <tr>
                    <td>
                        <?php
                            $sql2="SELECT `user_ID`, fullname FROM users WHERE `user_ID`=$user_id";
                            $conn2 = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                            $res2 = mysqli_query($conn2, $sql2);
                            $count2 = mysqli_num_rows($res2);
                            if($count2){
                                while($row2=mysqli_fetch_assoc($res2)){
                                    $fullname=$row2['fullname'];
                                    echo $fullname;
                                }
                            }
                        ?>
                    </td>
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