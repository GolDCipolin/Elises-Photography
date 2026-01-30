<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
//page secuirty
if(!isset($_SESSION['account_type'])){
    header('Location:/login.php');
    exit;
}else if($_SESSION['account_type'] !== 'staff'){
    header('Location:/account.php');
    exit;
}//end of if !isset
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
    <div class="form">
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Blog Title" class="select">
            <textarea name="content" placeholder="Blog Details" class="select"></textarea>
            <input class="select" type="file" name="image" id="">
            <button name="new_post" class="btn-secondary">Add Post</button>
        </form>
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