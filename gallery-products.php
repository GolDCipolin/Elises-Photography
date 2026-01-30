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
$id = $_GET['id'];
$sql = "SELECT * FROM picture";
$conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count){
    while($row=mysqli_fetch_assoc($res)){
        $pic_id=$row['picture_id'];
        $title=$row['title'];
        $image_name=$row['image_name'];
        $cat_id=$row['category_id'];
        if($id == $cat_id){
            ?>

            <section class="card-1">
                <img src="images/pic/<?php echo $image_name; ?>" class="normal-card normal-card--wedding">
                <a class="text" href="product.php?id=<?php echo $pic_id; ?>">
                <p class="normal-card__text-wedding">
                    <?php echo $title; ?>
                </p>
            </section>
        
<?php
        }
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