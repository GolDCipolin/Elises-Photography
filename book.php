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
$date = $_GET['date'];
$sql2="SELECT a_date FROM form";
$conn2=mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
$res2 = mysqli_query($conn2, $sql2);
$count2 = mysqli_num_rows($res2);
if($count2){
    while($row2=mysqli_fetch_assoc($res2)){
        $a_date=$row2['a_date'];
        if($date==$a_date){
            echo"<script> alert('This date has been booked already!');    
            window.location.href='booking.php';</script>";
        }
    }
}else{
    $conn=mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);
    if(isset($_GET['date'])){
        $date=$_GET['date'];
    }
    if(isset($_POST['submit'])){
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

        $sql="INSERT INTO form
                (fullname,email,company,address1,address2,city,country,postcode,phone,a_date,a_time)
                VALUES('$fullname','$email','$company','$address1','$address2','$city','$country','$postcode','$phone','$a_date','$a_time')";
        
        // echo "$sql<br>";

        $result=mysqli_query($conn,$sql);

        if(!$result){
            echo mysqli_error($conn);
        }else{
            echo"<script> alert('Your form has been sent!');    
            window.location.href='index.php';</script>";
        } 
    }//end of isset
}
?>
<?php
    $user_id=$_SESSION['user_id'];
    $sql3="SELECT * FROM users WHERE `user_ID`=$user_id";
    $conn3=mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
    $res3= mysqli_query($conn3, $sql3);
    $row3=mysqli_fetch_assoc($res3);
    $fullname=$row3['fullname'];
    $email=$row3['email'];
?>
<?php
    $conn=mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);
    if(isset($_GET['date'])){
        $date=$_GET['date'];
    }
    if(isset($_POST['submit'])){
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

        $sql="INSERT INTO form
                (`user_ID`,fullname,email,company,address1,address2,city,country,postcode,phone,a_date,a_time)
                VALUES('$user_id','$fullname','$email','$company','$address1','$address2','$city','$country','$postcode','$phone','$a_date','$a_time')";
        
        // echo "$sql<br>";

        $result=mysqli_query($conn,$sql);

        if(!$result){
            echo mysqli_error($conn);
        }else{
            echo"<script> alert('Your form has been sent!');    
            window.location.href='index.php';</script>";
        } 
    }//end of isset
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

<!-- email, user_ID will be already in the database -->
<form class="photo" action="" method="post">

    <label class="photo__label" for="f_name">Full Name</label>
    <input type="text" name="fullname" id="f_name" value="<?php echo $fullname; ?>" class="photo__text-field photo__text-field-top" required> <br>

    <label class="photo__label" for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="photo__text-field" required> <br>

    <label class="photo__label" for="company">Company (optional)</label>
    <input type="text" name="company" id="company" class="photo__text-field"> <br>

    <label class="photo__label" for="address1">Address Line 1</label>
    <input type="text" name="address1" id="address1" class="photo__text-field" required> <br>

    <label class="photo__label" for="address2">Address Line 2</label>
    <input type="text" name="address2" id="address2" class="photo__text-field" required> <br>

    <label class="photo__label" for="city">City</label>
    <input type="text" name="city" id="city" class="photo__text-field" required> <br>

    <label class="photo__label" for="c_r">Country/Region</label>
    <input type="text" name="country" id="c_r" class="photo__text-field" required> <br>

    <label class="photo__label" for="postcode">Postcode</label>
    <input type="text" name="postcode" id="postcode" class="photo__text-field" required> <br>

    <label class="photo__label" for="phone">Phone</label>
    <input type="tel" name="phone" id="phone" class="photo__text-field" required> <br>

    <label class="photo__label" for="a_date">Appointment Date (DD/MM/YYYY)</label>
    <input type="date" name="a_date" id="a_date" placeholder="dd-mm-yyyy" value="<?php echo $date; ?>" class="photo__text-field" readonly> <br>

    <label class="photo__label" for="a_date">Appointment Time (15:00 etc.)</label>
    <input type="time" name="a_time" id="a_time" min="09:00" max="15:00" class="photo__text-field" required> <br>

    <button name="submit" class="photo__submit" type="submit">Submit Form</button>

</form>

<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->