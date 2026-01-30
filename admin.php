<?php
session_start();
require_once("protected/connection.php");
if(!isset($_SESSION['account_type'])){
    header('Location:/login.php');
    exit;
}else if($_SESSION['account_type'] !== 'staff'){
    header('Location:/mypage.php');
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
<h1 class="top">Admin Panel</h1>
<section class="table" style="margin-top: 5rem; margin-bottom: 5rem;">
    <a href="manage-booking.php" class="menu">Manage Bookings</a>
    <a href="manage-category.php" class="menu">Manage Category</a>
    <a href="manage-delivery.php" class="menu">Manage Delivery</a>
    <a href="sales.php" class="menu">Manage Order</a>
    <a href="manage-picture.php" class="menu">Manage Picture</a>
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