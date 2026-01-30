<?php
session_start();
require_once("protected/connection.php");
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
<?php
    $sql = "SELECT * FROM category";

    $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count>0){
        while($row=mysqli_fetch_assoc($res)){
            $id=$row['category_id'];
            $title=$row['title'];
            $image_name=$row['image_name'];
            ?>

            <section class="card-1">
                <img src="images/category/<?php echo $image_name; ?>" class="normal-card normal-card--wedding">
                <a class="text" href="gallery-products.php?id=<?php echo $id; ?>">
                <p class="normal-card__text-wedding text">
                    <?php echo $title; ?>
                </p>
            </section>
<?php
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