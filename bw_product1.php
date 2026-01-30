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
    <link rel="stylesheet" href="css/bw_product1.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->

<section class="product_box">
    <img src="images/bw_product.png" class="big-img">
    <p class="bw_title">
        Black and White <br>
        Truck Photo
        <p class="bw_desc">
        This photo was taken while I was at California. <br>
        This vehical shows how old the place is and <br>
        how they still use old vehicals to this day.
        </p>
        <p class="req">
        Photo cannot be resold.
        </p>
    </p>
    <section class="size">
        <section class="size0">
            <p class="A0">
                A0
            </p>
        </section>
        <section class="size1">
            <p class="A1">
                A1
            </p>
        </section>
        <section class="size2">
            <p class="A2">
                A2
            </p>
        </section>
        <section class="size3">
            <p class="A3">
                A3
            </p>
        </section>
        <section class="size4">
            <p class="A4">
                A4
            </p>
        </section>
    </section>
    <section class="cost">
        <p class="cost-text">
            £15.00
        </p>
    </section>
    <button class="like">Like (0)</button>
    <form action="checkout.php">
        <label class="qty" for="qty">Qty</label>
        <select class="cars" name="cars" id="cars">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <input type="radio" id="frame" name="frame" value="frame" class="frame">
        <label class="framed" for="framed">+£0 Framed</label><br>
        <br><br>
        <input class="Buy" type="submit" value="Buy Now">
    </form>
    <button class="download" onclick="location.href = 'checkout.php';">Download Now</button>
</section>


<section class="bottom_pics">
    <img src="images/bw_product_bottom1.png" class="bottom-img1">
    <img src="images/bw_product_bottom2.png" class="bottom-img2">
    <img src="images/bw_product_bottom3.png" class="bottom-img3">
    <img src="images/bw_product_bottom4.png" class="bottom-img4">
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