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
$sql="SELECT order_date, order_num, picture_id, `type`, order_status, final_price FROM orders WHERE `user_ID`=$user_id";
$conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count){
    while($row=mysqli_fetch_assoc($res)){
        $order_date=$row['order_date'];
    }
}
if($order_date==''){
    echo"<script> alert('You have not ordered anything!');    
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
        <th>Order Num</th>
        <th>Order Date</th>
        <th>Image</th>
        <th>Status</th>
        <th>Total</th>
    </tr>

    <?php
        $sql="SELECT order_date, order_num, picture_id, `type`, order_status, final_price FROM orders WHERE `user_ID`=$user_id";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count){
            while($row=mysqli_fetch_assoc($res)){
                $order_date=$row['order_date'];
                $order_num=$row['order_num'];
                $picture_id=$row['picture_id'];
                $type=$row['type'];
                $order_status=$row['order_status'];
                $final_price=$row['final_price'];
                $sql2="SELECT image_name FROM picture WHERE picture_id=$picture_id";
                $conn2 = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                $res2 = mysqli_query($conn2, $sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2){
                    while($row2=mysqli_fetch_assoc($res2)){
                        $image_name=$row2['image_name'];
                        ?>
                        <tr>
                            <td><?php echo $order_num; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td>
                                <img src="images/pic/<?php echo $image_name;?>" class="img">
                            </td>
                                <?php
                                    if($type=='digital'){
                                        ?>
                                        <td>Digital</td>
                                        <?php
                                    }else{
                                        ?>
                                        <td><?php echo $order_status; ?></td>
                                        <?php
                                    }
                                ?>
                            <td> <?php echo $final_price; ?></td>
                            <td>
                                <a href="update-order.php?id=<?php echo $order_num; ?>" class="btn-secondary">Update Order</a> <br><br>
                                <a href="delete-order.php?id=<?php echo $order_num; ?>" class="btn-danger">Cancel Order</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
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