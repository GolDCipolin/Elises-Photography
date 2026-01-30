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
    <link rel="stylesheet" href="css/checkout3.css">
    <link rel="stylesheet" href="js/checkout3.js">
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
        Information > Shipping > Payment >
    </p>
    <p class="text-rest">
        Success
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
    <section class="line2"></section>
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
    <section class="d_text">
        <p class="delivery">
            Delivery
        </p>
        <p class="d_time">
            Free Delivery (2-3 Days)
        </p>
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

<button type="button" class="credit-card"></button>
<div class="content-card">
    <form class="card" action="" method="post">
    
        <label class="card__label" for="number">Card Number</label>
        <input type="number" name="number" id="number" class="card__text-field"> <br>

        <label for="name" class="card__label">Name on card</label>
        <input type="text" name="text" id="text" class="card__text-field "> <br>

        <label for="date" class="card__label">Expiration date</label>
        <input type="month" name="text" id="text" class="card__text-field "> <br>

        <label class="card__label" for="code">Security Code</label>
        <input type="number" name="number" id="number" maxlength="3" class="card__text-field"> <br>
    </form>
</div>

<button type="button" class="collapsible"></button>
<div class="content">
    <form class="paypal" action="" method="post">
    
        <label class="paypal__label" for="email">Paypal Email</label>
        <input type="email" name="email" id="email" class="paypal__text-field"> <br>

        <label for="password" class="paypal__label">Paypal Password</label>
        <input type="password" name="password" id="password" class="paypal__text-field "> <br>

    </form>
</div>



<button class="photo__submit" onclick="document.location='checkout4.php'" type="submit">Pay now</button>











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
<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->