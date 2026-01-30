<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/wishlist.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
<section class="wishlist">
    <section class="bigbox1"></section>
    <section class="bigbox2"></section>
    <section class="bigbox3"></section>
    <section class="bigbox4"></section>
    <img src="images/blackwhiteman.jpg" alt="" class="img_1">
            <section class="av1-box">
                <p class="av1">
                    Available - A3
                </p>
                    <section class="delete1"></section>
            </section>
    <img src="images/wishlist2.png" alt="" class="img_2">
            <section class="av2-box">
                <p class="av2">
                    Available - A0
                </p>
                    <section class="delete2"></section>
            </section>
    <img src="images/wishlist3.png" alt="" class="img_3">
            <section class="av3-box">
                <p class="av3">
                    Not Available
                </p>
                    <section class="delete3"></section>
            </section>
    <img src="images/wishlist4.png" alt="" class="img_4">
            <section class="av4-box">
                <p class="av4">
                    Not Available - A4
                </p>
                    <section class="delete4"></section>
            </section>
</section>
<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->