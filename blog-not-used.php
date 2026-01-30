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
    <link rel="stylesheet" href="css/blogg.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
<section class="blog1">
    <p class="blog1-text">
    The time I am writing this for the blog, I have came to Spain and had a great time there. I had some <br>
    photoshoot that my customers needed which I couldn’t refuse. Here are some pictures I have taken. When <br>
    I was during my teens I used to wanted to go to other countries and Spain was one of my got to go country. <br>
    Anyways other than that I'm having a great time right now and if you haven't been to Spain before you should <br>
    go check out the place its really good everybody is so friendly, Anyways bye.
    <section class="blog1-date">
        <p class="date1">
            02/01/2021
        </p>
    </section>
    <img src="images/top_blog.png" alt="" class="blog1-ad">
        <nav class="blog1-ad__links">
            <a href="" class="blog1-ad__link blog1-ad__link--active"></a>
            <a href="" class="blog1-ad__link"></a>
            <a href="" class="blog1-ad__link"></a>
        </nav>
</section>

<section class="blog2">
    <p class="blog2-text">
    By the time I am writing this I will be leaving to California because I got a request for a <br>
    wedding photoshoot. After the photoshoot I will be leaving for Spain but I will write another blog once I’m at Spain. <br>
    But California has been a great place so far. I have taken so many pictures in Cali that I will be <br>
    planning to put some of the photos for sale in ym website so stay tuned for that. I also wanted to thank <br>
    everybody that greeted me with a big smile. Anyways bye.
    </p>
    <section class="blog2-date">
        <p class="date2">
            15/12/2020
        </p>
    </section>
</section>

<section class="blog3">
    <p class="blog3-text">
    Hello guys I’m back. Anyways a couple of years ago I went to LA to take some pictures. Back then my interest <br>
    were black and white photography and here are some few of them. I had a great time there and <br>
    since I am at California right now and I'm having a great time so far. Sadly I will be leaving soon <br>
    but I will be making another post about it. <br>
    I will be going now bye.
    </p>
    <section class="blog3-date">
        <p class="date3">
            12/12/2020
        </p>
    </section>
        <img src="images/bottom_blog.png" alt="" class="blog3-ad">        
        <nav class="blog3-ad__links">
            <a href="" class="blog3-ad__link blog3-ad__link--active"></a>
            <a href="" class="blog3-ad__link"></a>
            <a href="" class="blog3-ad__link"></a>
        </nav>
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