<?php
session_start();
require_once("protected/connection.php");
require_once("protected/login-scripts.php");

$conn = mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);

if(!$conn){
    die("connection failed".mysqli_connect_error());
}//end of if !$conn

// echo "connected - all is good <br>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->


<form class="register" action="" method="post">
    
    <label class="register__label" for="f_name">Full Name</label>
    <input type="text" name="f_name" id="f_name" class="register__text-field"> <br>

    <label for="username" class="register__label">Username</label>
    <input type="text" name="username" id="username" class="register__text-field"> <br>

    <label for="password" class="register__label">Password</label>
    <input type="password" name="password" id="password" class="register__text-field "> <br>

    <label for="password2" class="register__label register__label--pass2">Re-enter Password</label>
    <input type="password" name="password2" id="password2" class="register__text-field"> <br>

    <label class="register__label" for="email">E-mail</label>
    <input type="email" name="email" id="email" class="register__text-field"> <br>

    <button class="register__submit" type="submit" name="form__sub">Register</button>
</form>

<form class="login" action="" method="post">
    
    <label class="login__label" for="l_email">E-mail</label>
    <input type="email" name="l_email" id="l_email" class="login__text-field"> <br>

    <label for="password3" class="login__label">Password</label>
    <input type="password" name="password3" id="password3" class="login__text-field"> <br>

    <button class="login__submit" type="submit" name="log__but">Log-In</button>
</form>

<section class="line">
</section>































<!-- <section class="register login-box__fn">
    <p class="fn">
        Full Name
    </p>
</section>

<section class="register login-box__user">
    <p class="user">
        Username
    </p>
</section>

<section class="register login-box__pass">
    <p class="pass">
        Password
    </p>
</section>

<section class="register login-box__repass">
    <p class="repass">
        Re-enter Password
    </p>
</section>

<section class="register login-box__email">
    <p class="email">
        E-mail
    </p>
</section> -->
<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->