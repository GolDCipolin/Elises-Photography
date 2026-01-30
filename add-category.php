<?php
session_start();
require_once("protected/connection.php");
if(!isset($_SESSION['account_type'])){
    header('Location:login.php');
    exit;
}else if($_SESSION['account_type'] !== 'staff'){
    header('Location:account.php');
    exit;
}//end of if !isset
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/admin.css">
    
</head>
<body>
<!-- end of base -->
<div class="wrapper">
<?php
require_once("header.php");
?>
<h1 class="top">Add Category</h1>



<?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
?> 

<br><br>

<!-- Add Category Form Starts -->
<form action="" method="POST" enctype="multipart/form-data">

    <table>
        <tr class="form">
            <td class="text">Title: </td>
            <td>
                <input class="select" type="text" name="title" placeholder="Category Title">
            </td>
        </tr>

        <tr class="form">
            <td class="text">Select Image: </td>
            <td>
                <input class="select" type="file" name="image" id="">
            </td>
        </tr>

        <tr class="form">
            <td colspan="2">
                <input type="submit" name="submit" class="btn-secondary sub" value="Add Category">
            </td>
        </tr>
    </table>

</form>

<!-- Add Category Form Ends -->

<?php

    //Check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        // echo "Clicked";

        //if upload button is pressed

        $image_name=$_FILES['image']['name'];

        //upload the iamge only if image is selected
        

        //auto rename our image
        //get the extension of our image (jpg, png, etc.) e.g. "pic.png"
        $ext = end(explode('.', $image_name));

        //rename the image 52:21
        $image_name="Pic_Category_".rand(000,999).'.'.$ext; // e.g. pic_category_456.jpg
        
        $source_path=$_FILES['image']['tmp_name'];

        $destination_path="images/category/".$image_name;

        $target=move_uploaded_file($source_path, $destination_path);
        

        // 1. Get the value from category form
        $title = $_POST['title'];

        //For Radio input, we need to check whether th ebutton is selected or not

        //2. Create SQL Query to insert category into database
        $sql = "INSERT INTO category SET
            title = '$title',
            image_name= '$image_name'
        ";
        
        //3. execute the query and save in database
        $conn = mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);

        //4. check whether the query executed or not and data added or not
        if($res){
            //Query executed and category added
            
            $_SESSION['add'] = "<div class='successs'>Category Addedd Successfully.</div>";
            //Redirect to manage category page
            header('location:manage-category.php');
        }else{
            //failed to add category
            $_SESSION['add'] = "<div class='error'>Failed to add category. </div>";
            //Redirect to manage category page
            header('location:manage-category.php');
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