<?php
session_start();
require_once("protected/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/checkout4.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
<?php
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
        $order=$_GET['order_num'];
    }
?>

<?php

    $sql="DELETE FROM cart WHERE `user_ID`=$user_id";
    $conn = mysqli_connect(DB_HOST, DB_DELETER, '', DB_NAME);
    $res = mysqli_query($conn, $sql);

?>

<section class="top-text">
    <p class="info">
        Information > Shipping > Payment > Success
    </p>
</section>

<section class="box">
    <p class="title">
        Payment Successful
    </p>
    <p class="title2">
        THANK YOU FOR YOUR PURCHASE
    </p>
    <p class="o_number">
        Order Number:#<?php echo $order; ?>
    </p>
    <p class="desc">
    An email has been sent to you for more information about the order. <br>
    If you have purchased a digital photo, <br> please go to your account page to download them.
    </p>
</section>

<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->