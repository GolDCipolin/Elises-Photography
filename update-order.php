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
    if(isset($_GET['id'])){
        $order_num=$_GET['id'];
        $sql="SELECT * FROM orders WHERE order_num=$order_num";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($res);
        $address1=$row['address1'];
        $address2=$row['address2'];
        $postcode=$row['postcode'];
        $country=$row['country'];
        $city=$row['city'];
        $phone=$row['phone'];
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
    <link rel="stylesheet" href="css/photo.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">
<?php
require_once("header.php");
?>
<!-- start of base -->
<form class="photo" action="" method="post">

    <label class="photo__label" for="f_name">Address1</label>
    <input type="text" name="address1" value="<?php echo $address1; ?>" id="f_name" class="photo__text-field photo__text-field-top"><br>

    <label class="photo__label" for="email">Address2</label>
    <input type="text" name="address2" id="email" value="<?php echo $address2; ?>" class="photo__text-field"> <br>

    <label class="photo__label" for="company">Postcode</label>
    <input type="text" name="postcode" id="company" value="<?php echo $postcode; ?>" class="photo__text-field"> <br>

    <label class="photo__label" for="address1">City</label>
    <input type="text" name="city" value="<?php echo $city; ?>" id="address1" class="photo__text-field"> <br>

    <label class="photo__label" for="address2">Country</label>
    <input type="text" name="country" id="address2" value="<?php echo $country; ?>" class="photo__text-field"> <br>

    <label class="photo__label" for="city">Phone Number</label>
    <input type="number" name="phone" id="city" value="<?php echo $phone; ?>" class="photo__text-field"> <br>

    <button name="submit" class="photo__submit" type="submit">Edit Details</button>

</form>

<?php
    if(isset($_POST['submit'])){
        // echo "hi";
        $address1=$_POST['address1'];
        $address2=$_POST['address2'];
        $postcode=$_POST['postcode'];
        $city=$_POST['city'];
        $country=$_POST['country'];
        $phone=$_POST['phone'];

        $sql2="UPDATE orders SET
        address1='$address1',
        address2='$address2',
        postcode='$postcode',
        city='$city',
        country='$country',
        phone='$phone'
        WHERE order_num=$order_num
        ";
        $conn2 = mysqli_connect(DB_HOST, DB_UPDATER, DB_UPD_PASS, DB_NAME);
        $res2=mysqli_query($conn2, $sql2);
        if($res2){
            echo"<script> alert('You have successfully updated your order details!');    
            window.location.href='orders.php';</script>";
        }
    }
?>
<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->