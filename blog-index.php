<?php
session_start();
?>
<?php

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

        <?php if(isset($_REQUEST['info'])){?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert alert-success" role="alert">
                    Post has been added successfully
                </div>
            <?php }else if($_REQUEST['info'] == "updated"){ ?>
                <div class="alert alert-success" role="alert">
                    Post has been updated successfully
                </div>
            <?php }else if($_REQUEST['info'] == "deleted"){ ?>
                <div class="alert alert-danger" role="alert">
                    Post has been deleted successfully
                </div>
            <?php }?>
        <?php }?>

        <?php
        if(!isset($_SESSION['account_type'])){
            
        }else if($_SESSION['account_type'] == 'staff'){
            echo '<a href="blog-create.php" class="create-button">+ Create a new post</a>';
        }
        ?>

        <div class="row">

            <?php foreach($query as $q){?>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <div class="card text-white bg-dark mt-5">
                        <div class="card-body" style="width: 18rem;">
                            <h5 class="card-title"><?php echo $q['title'];?></h5>
                            <p class="card-text"><?php echo $q['content'];?></p>
                            <a href="blog-view.php?id=<?php echo $q['id'];?>" class="btn btn-light">Read More <span class="text-danger">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            <?php }?>  

        </div>

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