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
    $sql="SELECT * FROM users WHERE `user_ID`=$user_id";
    $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
    $res = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($res);
    $fullname=$row['fullname'];
    $username=$row['username'];
    $password=$row['password'];
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
    <input type="text" name="fullname" value="<?php echo $fullname; ?>" id="f_name" class="photo__text-field photo__text-field-top"><br>

    <label class="photo__label" for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="photo__text-field"> <br>

    <label class="photo__label" for="company">Username</label>
    <input type="text" name="username" id="company" value="<?php echo $username; ?>" class="photo__text-field"> <br>

    <label class="photo__label" for="address1">Old Password</label>
    <input type="password" name="password1" value="<?php echo $password; ?>" id="address1" class="photo__text-field" readonly> <br>

    <label class="photo__label" for="address2">New Password</label>
    <input type="password" name="password2" id="address2" minlength="8" class="photo__text-field"> <br>

    <label class="photo__label" for="city">Confirm New Password</label>
    <input type="password" name="password3" id="city" class="photo__text-field"> <br>

    <button name="submit" class="photo__submit" type="submit">Edit Details</button>

</form>

<?php
    if(isset($_POST['submit'])){
        // echo "hi";
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password1'];
        $n_password=$_POST['password2'];
        $nn_password=$_POST['password3'];

        if($n_password!='' && $nn_password!=''){ //if passwords are not empty
            if($n_password==$nn_password){
                $options=[
                    'memory_cost'=>2048,
                    'time_cost'=>4,
                    'threads'=>3,
                ];//end of options 
                $enc_pass=password_hash($n_password, PASSWORD_ARGON2ID, $options);
                $sql3="UPDATE users SET
                fullname='$fullname',
                username='$username',
                email='$email',
                `password`='$n_password',
                enc_pass='$enc_pass'
                WHERE `user_ID`=$user_id
                ";
                $conn3 = mysqli_connect(DB_HOST, DB_UPDATER, DB_UPD_PASS, DB_NAME);
                $res3=mysqli_query($conn3, $sql3);
                if($res3){
                    echo"<script> alert('You have successfully updated your details!');    
                    window.location.href='account.php';</script>";
                }
            }else{
                echo"<script> alert('New Passwords are not correct');</script>";
            }
        }else{
            $sql2="UPDATE users SET
            fullname='$fullname',
            username='$username',
            email='$email'
            WHERE `user_ID`=$user_id
            ";
            $conn2 = mysqli_connect(DB_HOST, DB_UPDATER, DB_UPD_PASS, DB_NAME);
            $res2=mysqli_query($conn2, $sql2);
            if($res2){
                echo"<script> alert('You have successfully updated your details!');    
                window.location.href='account.php';</script>";
            }
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