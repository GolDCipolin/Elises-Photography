<?php
session_start();
require_once("protected/connection.php");
?>
<?php
    $sql="SELECT * FROM orders WHERE order_id=id";
    $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
    $res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
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
        <th>Order Date</th>
        <th>Order Number</th>
        <th>User</th>
        <th>Email</th>
        <th>Address 1</th>
        <th>Address 2</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Frame</th>
        <th>Type</th>
        <th>Price</th>
        <th>Postcode</th>
    </tr>
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