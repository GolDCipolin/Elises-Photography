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
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/slideshow.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
<section class="main-ad">
    <!-- <div class="absolute"> -->
    <h2 class="main-ad__text">
        The best photography <br>
        website there is... <br>
        Elise Photography
    </h2>
    
    <nav class="main-ad__links">
        <a href="" class="main-ad__link main-ad__link--active"></a>
        <a href="" class="main-ad__link"></a>
        <a href="" class="main-ad__link"></a>
    </nav>
    <!-- </div> -->
</section>

<section class="small-card s_sculpter">
    <img src="images/blackwhitestatue.jpg" alt="" class="small-card--sculpter">
    <p class="small-card__text-sculpter">
        Sculpter <br>
        Photos <br>
        £40 per <br>
        photo
    </p>
</section>

<section class="small-card small card--front s_painting">
    <img src="images/paintingguy.jpg" alt="" class="small-card--painting">
    <p class="small-card__text-painting">
        Painting Photos <br>
        £30 per photo
    </p>
    
</section>

<section class="small-card small card--front s_wedding">
    <img src="images/small_wedding.png" alt="" class="small-card--wedding">
    <p class="small-card__text-photoshoot">
        Photoshoots/Wedding shoots <br>
        £40 per photo
    </p>
</section>

<section class="small-card small card--front s_photoshop">
    <img src="images/small_photoshop.png" alt="" class="small-card--photoshop">
    <p class="small-card__text-photoshop">
        Photoshopped <br>
        shoots <br>
        £60 per photo
    </p>
</section>


<section class="bottom-card">
    <section class="bottom-card__text">

        <h3 class="bottom-card__title">
        Worked with multiple magazines!
        </h3>

        <p class="bottom-card__detail">
        In my previous work I had worked with other big magazine companies for their cover pages. <br>
        I started of at Discovery Girls, then moved on to The New Yorker and Golf Magazine <br>
        because of my outstanding work with these companies other comapnies such as a newspaper company has <br>
        hired me to do their photo work. Now currently I work with the Daily Mail, National Geographic <br>
        Time and The Digital Photographer Magazine. Because of my work I wanted to make a platofmr to myself <br>
        where I can share my other work and sell them to other people. So I decided to make this website <br>
        that you are on. Please check out all of my photos and if you like what you see you can purchase them <br>
        in a cheap price.
        </p>
    </section>
</section>


<section class="huge-card">
    <p class="hexagon-text">
        Buy 4 at a price of 1 (Limited)
    </p>
    <img class="huge-card__img huge-card__img--left1" src="images/miguel-angel-hernandez-jLFrKqhhkow-unsplash.jpg" alt="">
    <img class="huge-card__img huge-card__img--right1" src="images/charles-chen-dKsA5xl8Ygo-unsplash.jpg" alt="">
    <img class="huge-card__img huge-card__img--left2" src="images/olivia-bauso-30UOqDM5QW0-unsplash.jpg" alt="">
    <img class="huge-card__img huge-card__img--right2" src="images/wilhelm-gunkel-LpQs_3t4Dck-unsplash.jpg" alt="">
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