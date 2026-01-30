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
<table class="tbl-full sale">
    <a href="sales.php" class="btn-primary sa">Sort by Normal</a>
    <a href="low_val.php" class="btn-primary sa">Sort by Lowest Price</a>
    <a href="high_qty.php" class="btn-primary sa">Sort by Highest Sold Picture</a>
    <a href="low_qty.php" class="btn-primary sa">Sort by Lowest Sold Picture</a>
    <tr>
        <th>Order Num</th>
        <th>Order Date</th>
        <th>User</th>
        <th>Picture</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total Price</th>
    </tr>

    <?php
        $sql="SELECT * FROM orders ORDER BY final_price DESC";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count){
            while($row=mysqli_fetch_assoc($res)){
                $order_date=$row['order_date'];
                $order_num=$row['order_num'];
                $user_id=$row['user_ID'];
                $fullname=$row['fullname'];
                $picture_id=$row['picture_id'];
                $quantity=$row['quantity'];
                $price=$row['price'];
                $final_price=$row['final_price'];
                $sql2="SELECT title FROM picture WHERE picture_id=$picture_id";
                $conn2 = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                $res2 = mysqli_query($conn2, $sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2){
                    while($row2=mysqli_fetch_assoc($res2)){
                        $title=$row2['title'];
                        ?>
                        <tr>
                            <td><?php echo $order_num; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td>£<?php echo $price; ?></td>
                            <td>£<?php echo $final_price; ?></td>
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