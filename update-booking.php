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
<?php
    if(isset($_GET['id'])){
        $form_id=$_GET['id'];
        $sql="SELECT * FROM form WHERE form_id=$form_id";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($res);
        $fullname=$row['fullname'];
        $email=$row['email'];
        $company=$row['company'];
        $address1=$row['address1'];
        $address2=$row['address2'];
        $city=$row['city'];
        $country=$row['country'];
        $postcode=$row['postcode'];
        $phone=$row['phone'];
        $a_date=$row['a_date'];
        $a_time=$row['a_time'];
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

    <label class="photo__label" for="f_name">Full Name</label>
    <input type="text" name="fullname" id="f_name" value="<?php echo $fullname; ?>" class="photo__text-field photo__text-field-top" required> <br>

    <label class="photo__label" for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="photo__text-field" required> <br>

    <label class="photo__label" for="company">Company (optional)</label>
    <input type="text" name="company" id="company" value="<?php echo $company; ?>" class="photo__text-field"> <br>

    <label class="photo__label" for="address1">Address Line 1</label>
    <input type="text" name="address1" id="address1" value="<?php echo $address1; ?>" class="photo__text-field" required> <br>

    <label class="photo__label" for="address2">Address Line 2</label>
    <input type="text" name="address2" id="address2" value="<?php echo $address2; ?>" class="photo__text-field" required> <br>

    <label class="photo__label" for="city">City</label>
    <input type="text" name="city" id="city" value="<?php echo $city; ?>" class="photo__text-field" required> <br>

    <label class="photo__label" for="c_r">Country/Region</label>
    <input type="text" name="country" id="c_r" value="<?php echo $country; ?>" class="photo__text-field" required> <br>

    <label class="photo__label" for="postcode">Postcode</label>
    <input type="text" name="postcode" id="postcode" value="<?php echo $postcode; ?>" class="photo__text-field" required> <br>

    <label class="photo__label" for="phone">Phone</label>
    <input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>" class="photo__text-field" required> <br>

    <label class="photo__label" for="a_date">Appointment Date (DD/MM/YYYY)</label>
    <input type="date" name="a_date" id="a_date" placeholder="dd-mm-yyyy" value="<?php echo $a_date; ?>" class="photo__text-field" readonly> <br>

    <label class="photo__label" for="a_date">Appointment Time (15:00 etc.)</label>
    <input type="time" name="a_time" id="a_time" min="09:00" max="15:00" value="<?php echo $a_time; ?>" class="photo__text-field" required> <br>

    <button name="submit" class="photo__submit" type="submit">Change Booking</button>

</form>

<?php
    if(isset($_POST['submit'])){
        // echo "hi";
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $company=$_POST['company'];
        $address1=$_POST['address1'];
        $address2=$_POST['address2'];
        $city=$_POST['city'];
        $country=$_POST['country'];
        $postcode=$_POST['postcode'];
        $phone=$_POST['phone'];
        $a_date=$_POST['a_date'];
        $a_time=$_POST['a_time'];

        $sql2="UPDATE form SET
        fullname='$fullname',
        email='$email',
        company='$company',
        address1='$address1',
        address2='$address2',
        postcode='$postcode',
        city='$city',
        country='$country',
        phone='$phone',
        a_date='$a_date',
        a_time='$a_time'
        WHERE form_id=$form_id
        ";
        $conn2 = mysqli_connect(DB_HOST, DB_UPDATER, DB_UPD_PASS, DB_NAME);
        $res2=mysqli_query($conn2, $sql2);
        if($res2){
            echo"<script> alert('You have successfully updated your order details!');    
            window.location.href='books.php';</script>";
        }else{
            echo $sql2;
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