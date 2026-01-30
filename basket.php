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
    <link rel="stylesheet" href="css/basket.css">
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
            ?>
            <section class="basket">
                <img src="images/pic/<?php echo $image_name; ?>" alt="" class="img_1">
                <div class="av1-box">
                    <p class="av1">
                        <?php echo $type; ?> 
                        <?php echo $quantity; ?>x
                    </p>
                <button onclick="document.location='delete-basket.php?pic_id=<?php echo $pic_id; ?>&user_id=<?php echo $user_id; ?>'" name="delete" class="delete1"></button>
                </div>
                <div class="price1-box">
                    <p class="price1">
                        £<?php echo $price; ?>
                    </p>
                </div>
            </section>

            <!-- <section class="basket basket-border">
                <img src="images/pic/<?php echo $image_name; ?>" alt="" class="img_1">
                <section class="av1-box">
                    <p class="av1">
                        <?php echo $type; ?>
                        <?php echo $quantity; ?>x
                    </p>
                </section>
                <button onclick="document.location='delete-basket.php?pic_id=<?php echo $pic_id; ?>&user_id=<?php echo $user_id; ?>'" name="delete" class="delete1"></button>
                <section class="price1-box">
                    <p class="price1">
                        £<?php echo $price; ?>
                    </p>
                </section>
                <a download="images/pic/<?php echo $image_name; ?>" href="images/pic/<?php echo $image_name; ?>" class="download">Download</a>
            </section> -->
            <?php
        }
    }
    $user_id=$_SESSION['user_id'];
    $sql="SELECT * FROM cart WHERE `user_ID`=$user_id";
    $conn=mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
    $res=mysqli_query($conn, $sql);
    $count=mysqli_num_rows($res);
    if($pic_id==''){
    echo"<script> alert('Your basket is empty!');    
    window.location.href='gallery.php';</script>";
    }
?>

<button class="checkout__submit" onclick="document.location='checkout.php?user_id=<?php echo $user_id; ?>'" type="submit">Proceed to Checkout</button>
<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->