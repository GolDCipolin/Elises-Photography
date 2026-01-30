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
    <link rel="stylesheet" href="css/checkout2.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
<section class="top-text">
    <p class="info">
        Information > Shipping >
    </p>
    <p class="text-rest">
        Payment > Success
    </p>
</section>

<section class="big-box">
    <section class="c_text">
        <p class="contact">
            Contact
        </p>
        <p class="e_address">
            *insert email address*
        </p>
        <section class="change">
            <p class="change_text">
                Change
            </p>
        </section>
    </section>
    <section class="line"></section>
    <section class="s_text">
        <p class="ship">
            Ship to
        </p>
        <p class="d_address">
            *insert delivery address*
        </p>
        <section class="change2">
            <p class="change_text2">
                Change
            </p>
        </section>
    </section>
</section>

<section class="basket">
    <p class="t_basket">
        Basket
    </p>
    <p class="cost">
        £60.00
    </p>
    <img src="images/basket1.jpg" alt="" class="image1">
    <img src="images/basket2.jpg" alt="" class="image2">
    <img src="images/basket3.jpg" alt="" class="image3">
    <img src="images/basket4.jpg" alt="" class="image4">
</section>

<form>
    <section class="free_d">
        <p class="free_text">
            Free Delivery (2-3 Days)
        </p>
        <label>
        <input type="radio" name="delivery" class="free_delivery" required>
        </label>
    </section>
    <button class="photo__submit" onclick="document.location='checkout3.php'" type="submit">Continue to payment</button>
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