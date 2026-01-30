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
    <link rel="stylesheet" href="css/baskett.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
<?php
    $user_id=$_SESSION['user_id'];
    $sql="SELECT * FROM cart WHERE `user_ID`=$user_id";
    $conn=mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
    $res=mysqli_query($conn, $sql);
    $count=mysqli_num_rows($res);
    if($count){
        while($row=mysqli_fetch_assoc($res)){
            $pic_id=$row['picture_id'];
            $image_name=$row['image_name'];
            $type=$row['type'];
            $frame=$row['frame'];
            $quantity=$row['quantity'];
            $price=$row['price'];
        }
    }
?>

<button class="checkout__submit" onclick="document.location='checkout.php'" type="submit">Proceed to Checkout</button>
<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->