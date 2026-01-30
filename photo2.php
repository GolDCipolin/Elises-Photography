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
    <link rel="stylesheet" href="css/photo2.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->

<section class="box">
    <p class="title">
        Form Has Been Sent
    </p>
    <p class="title2">
        THANK YOU FOR SUBMUTTUNG YOUR FORM
    </p>
    <p class="desc">
    Because there are many other forms being sent to Elise you must <br>
    wait 2-3 weeks for a response from Elise. If you do not receive a <br>
    response you might have been declined.
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