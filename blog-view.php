<?php
session_start();
require_once("protected/connection.php");
$root = $_SERVER['DOCUMENT_ROOT'];
//page secuirty
?>
<?php
    $blog_id=$_GET['id'];
    $sql="SELECT * FROM blog WHERE id=$blog_id";
    $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
    $res = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($res);
    $image_name=$row['image_name'];
    include "blog-logic.php"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/blog.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
    <div class="container mt-5">
        <?php foreach($query as $q){?>
            <div class="bg-dark p-5 rounded-lg text-white text-center">
                <h1 class="table"><?php echo $q['title'];?></h1>

                <div class="d-flex mt-2 justify-content-center align-items-center">
                    <!-- <a href="blog-edit.php?id=<?php echo $q['id'];?>" class="btn edit btn-sm">Edit</a> -->
                    <?php
                        if(!isset($_SESSION['account_type'])){
                            header('Location:/blog-index.php');
                            exit;
                        }else if($_SESSION['account_type'] !== 'staff'){
                            header('Location:/blog-index.php');
                            exit;
                        }else{
                            ?>
                            <form method="POST">
                                <input type="text" hidden name="id" value="<?php echo $q["id"];?>">
                                <button class="delete" name="delete">Delete</button>
                            </form>
                            <?php
                        }
                    ?>

                </div>

            </div>
            <p class="desc"><?php echo $q['content'];?></p>
            <img src="images/blog/<?php echo $image_name; ?>" class="img">
        <?php }?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->