<?php
session_start();
require_once("protected/connection.php");
$conn=mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);
if(isset($_POST['submit'])){    
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $sql="INSERT INTO contact
            (fullname,email,message)
            VALUES('$fullname','$email','$message')";
    
    // echo "$sql<br>";

    $result=mysqli_query($conn,$sql);

    if(!$result){
        echo mysqli_error($conn);
    }else{
        echo"<script> alert('You have sent your messsage!');    </script>";
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
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
<section class="side-card">
    <p class="side-card__text">
        Alternative Methods
    </p>
</section>

<p class="text">
    If you have any questions we would love to answer them all.
</p>

<section class="side">
    <div class="phone">
        <section class="phone-icon">
            <p class="phone-text">
                Phone: +44444444444
            </p>
        </section>
    </div>
    <div class="email">
        <section class="email-icon">
            <p class="email-text">
                Email: ElisePhoto@Photo.com
            </p>
        </section>
    </div>
    <div class="insta">
        <section class="insta-icon">
            <p class="instagram-text">
                @ElisePhoto
            </p>
        </section>
    </div>
</section>

<section class="line"></section>

<form class="contact" action="" method="post">
    
    <label class="contact__name" for="f_name">Full Name</label>
    <input type="text" name="fullname" id="f_name" class="contact__text-field"> <br>

    <label class="contact__email" for="email">Email Address</label>
    <input type="email" name="email" id="email" class="contact__text-field contact__text-field-email"> <br>

    <label class="contact__message" for="message">Message</label>
    <textarea name="message" id="message" cols="50" rows="5" class="contact__text-field contact__text-field2"></textarea> <br>

    <button name="submit" class="contact__submit" type="submit">Send</button>
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