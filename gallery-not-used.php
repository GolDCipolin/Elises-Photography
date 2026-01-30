<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/gallery.css">
    
</head>
<body>
<!-- end of base -->
<div class="wrapper">
<?php
require_once("header.php");
?>
<!-- start of base -->
<section class="card-1 left-card normal card--front">
    <img src="images/jeremy-wong-weddings-464ps_nOflw-unsplash.jpg" alt="" class="normal-card normal-card--wedding">
    <p class="normal-card__text-wedding">
        Wedding Photos
    </p>
</section>

<section class="card-2 right-card normal card--front">
    <img src="images/blackwhitebuilding.JPG" alt="" class="normal-card normal-card--bw">
    <a href="bw.php" style="text-decoration:none">
        <p class="normal-card__text-bw">
            Black and White Photos
        </p>
    </a>
</section>

<section class="card-3 left-card normal card--front">
    <img src="images/paintingphoto.jpg" alt="" class="normal-card normal-card--painting">
    <p class="normal-card__text-painting">
        Painting Photos
    </p>
</section>

<section class="card-4 right-card normal card--front">
    <img src="images/sculpturephoto.JPG" alt="" class="normal-card normal-card--sculpture">
    <p class="normal-card__text-sculpture">
        Sculpture Photos
    </p>
</section>

<section class="card-5 left-card normal card--front">
    <img src="images/animalphoto.JPG" alt="" class="normal-card normal-card--animal">
    <p class="normal-card__text-animal">
        Animal Photos
    </p>
</section>

<section class="card-6 right-card normal card--front">
    <img src="images/buildingphoto.JPG" alt="" class="normal-card normal-card--building">
    <p class="normal-card__text-building">
        Building Photos
    </p>
</section>

<section class="bottom-card">
    <p class="bottom-card__text">
        More gallery and albums coming soon
    </p>
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