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
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/checkout2.css">
    <link rel="stylesheet" href="css/checkout3.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->

<?php
    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
        $sql="SELECT email, fullname FROM users WHERE `user_id`=$user_id";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($res);
        $email=$_SESSION['email'];
        $fullname=$row['fullname'];
    }
?>

<section class="top-text">
    <p class="info">
        Information >
    </p>
    <p class="text-rest">
        Shipping > Payment > Success
    </p>
</section>

<form class="photo" action="" method="post">
    
    <label class="photo__label photo_label--email" for="email">Email Address</label>
    <input type="email" value="<?php echo $email; ?>" name="email" id="email" class="photo__text-field photo__text-field-email"> <br>

    <label class="photo__label" for="f_name">Full Name</label>
    <input type="text" value="<?php echo $fullname; ?>" name="f_name" id="f_name" class="photo__text-field"> <br>

    <label class="photo__label" for="address1">Address Line 1</label>
    <input type="text" name="address1" id="address1" class="photo__text-field"> <br>

    <label class="photo__label" for="address2">Address Line 2</label>
    <input type="text" name="address2" id="address2" class="photo__text-field"> <br>

    <label class="photo__label" for="city">City</label>
    <input type="text" name="city" id="city" class="photo__text-field"> <br>

    <label class="photo__label" for="c_r">Country/Region</label>
    <input type="text" name="c_r" id="c_r" class="photo__text-field"> <br>

    <label class="photo__label" for="postcode">Postcode</label>
    <input type="text" name="postcode" id="postcode" class="photo__text-field"> <br>

    <label class="photo__label" for="phone">Phone</label>
    <input type="tel" name="phone" id="phone" class="photo__text-field"> <br>

    <section class="top-text2">
    <p class="info2">
        Information > Shipping >
    </p>
    <p class="text-rest2">
        Payment > Success
    </p>
    </section>


    <select name="delivery" class="free_d">
        <?php
            $sql3 = "SELECT * FROM delivery";
            $conn3 = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
            $res3=mysqli_query($conn3, $sql3);
            $count3=mysqli_num_rows($res3);
            if($count3){
                //we have categories
                while($row3=mysqli_fetch_assoc($res3)){
                    //get the details of categoires
                    $delivery_id = $row3['delivery_id'];
                    $delivery_name = $row3['delivery_name'];
                    ?>
                    <option value="<?php echo $delivery_name; ?>"><?php echo $delivery_name; ?></option>
                    <?php
                }
            }
            //display on dropdown
        ?>
    </select>

    <section class="top-text3">
        <p class="info3">
            Information > Shipping > Payment >
        </p>
        <p class="text-rest3">
            Success
        </p>
    </section>
    <section class="pay">
        <button type="button" class="credit-card"></button>
        <div class="content-card">
            <section class="card">
            
                <label class="card__label" for="number">Card Number</label>
                <input type="number" name="number" id="number" class="card__text-field"> <br>

                <label for="name" class="card__label">Name on card</label>
                <input type="text" name="text" id="text" class="card__text-field "> <br>

                <label for="date" class="card__label">Expiration date</label>
                <input type="month" name="text" id="text" class="card__text-field "> <br>

                <label class="card__label" for="code">Security Code</label>
                <input type="number" name="number" id="number" maxlength="3" class="card__text-field"> <br>
            </section>
        </div>

        <button type="button" class="collapsible"></button>
        <div class="content">
            <section class="paypal">
            
                <label class="paypal__label" for="paypal_email">Paypal Email</label>
                <input type="email" name="paypal_email" id="paypal_email" class="paypal__text-field"> <br>

                <label for="password" class="paypal__label">Paypal Password</label>
                <input type="password" name="password" id="password" class="paypal__text-field "> <br>

            </section>
        </div>
    </section>
    <INPUT TYPE=TEXT NAME="ACCOUNT" ID="ACCOUNT" VALUE="" MAXLENGTH=16 SIZE=16 hidden>
    <button class="photo__submit" id="random" name="submit" type="submit">Pay now</button>
</form>


<!-- onclick="document.location='checkout4.php'" -->
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
        content.style.display = "none";
        } else {
        content.style.display = "block";
        }
    });
    }
</script>

<script>
    var coll = document.getElementsByClassName("credit-card");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>

<script>
    function randomNumber(len) {
    var randomNumber;
    var n = '';

    for (var count = 0; count < len; count++) {
        randomNumber = Math.floor(Math.random() * 10);
        n += randomNumber.toString();
    }
    return n;
    }

    document.getElementById("ACCOUNT").value = randomNumber(9);
</script>

<?php
    if(isset($_POST['submit'])){
        $sql_pic="SELECT * FROM cart WHERE `user_ID`=$user_id";
        $conn_pic = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res_pic=mysqli_query($conn_pic, $sql_pic);
        $count_pic=mysqli_num_rows($res_pic);
        if($count_pic){
            while($row_pic=mysqli_fetch_assoc($res_pic)){
                $picture_id=$row_pic['picture_id'];
                $quantity=$row_pic['quantity'];
                $frame=$row_pic['frame'];
                $email=$_SESSION['email'];
                $fullname=$_POST['f_name'];
                $address1=$_POST['address1'];
                $address2=$_POST['address2'];
                $city=$_POST['city'];
                $country=$_POST['c_r'];
                $postcode=$_POST['postcode'];
                $phone=$_POST['phone'];
                $order='not complete';
                $order_num=$_POST['ACCOUNT'];
                $frame=$row_pic['frame'];
                $type=$row_pic['type'];
                $price=$row_pic['price'];
                $delivery=$_POST['delivery'];
                $final_price=($price * $quantity);
                $sql2="INSERT INTO orders
                (order_num, `user_ID`, fullname, email, address1, address2, picture_id, quantity, frame, `type`, price, postcode, country, city, phone, order_status, delivery, final_price)
                VALUES('$order_num','$user_id','$fullname','$email','$address1','$address2','$picture_id','$quantity','$frame','$type','$price','$postcode','$country','$city','$phone','$order','$delivery','$final_price')
                ";
                echo $sql2;
                $conn2=mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);
                $res2=mysqli_query($conn2, $sql2);
                if($res2){
                    echo "<script> window.location.href='checkout4.php?id=$user_id&order_num=$order_num';</script>";
                }
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