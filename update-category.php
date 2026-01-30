<?php
session_start();
require_once("protected/connection.php");
if(!isset($_SESSION['account_type'])){
    header('Location:login.php');
    exit;
}else if($_SESSION['account_type'] !== 'staff'){
    header('Location:account.php');
    exit;
}//end of if !issett
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<!-- start of base -->
<h1 class="top">Update Category</h1>

<br><br>

<?php

    //check whether the id is set or not
    if(isset($_GET['id'])){
        //get the ID and all other detials
        //echo "Getting the data";
        $id = $_GET['id'];
        //create SQL query to get all other detials
        $sql = "SELECT * FROM category WHERE category_id=$id";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);

        //execute the query
        $res = mysqli_query($conn, $sql);

        //count the rows to check whether the id is valid or not
        $count=mysqli_num_rows($res);

        if($count){
            //get all the data
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $current_image = $row['image_name'];
        }else{
            //redirect to manage category with session message
            $_SESSION['no-category-found'] = "<div class='error'>Category not found.</div>";
            header('location:manage-category.php');
        }


    }else{
        //redirect to manage category
        header('location:manage-category.php');
    }

?>

<form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr class="form">
            <td class="text uc">Title: </td>
            <td>
                <input class="select uci" type="text" name="title" value="<?php echo $title; ?>">
            </td>
        </tr>

        <tr class="form">
            <td class="text uc">Current Image: </td>
            <td>
                <?php
                    if($current_image != ""){
                        //display the image
                        ?>
                        <img class="select uci" src="images/category/<?php echo $current_image; ?>" width="480px">
                        <?php
                    }else{
                        echo "<div class='error'>Image not added.</div>";
                    }
                ?>
            </td>
        </tr>

        <tr class="form">
            <td class="text uc">New Image: </td>
            <td>
                <input class="select uci" type="file" name="image">
            </td>
        </tr>

        <tr class="form">
            <td>
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" value="Update Category" class="btn-secondary sub">
            </td>
        </tr>
    </table>
</form>

<?php

    if(isset($_POST['submit'])){
        // echo "Clicked";
        //1. get all the values from our form
        $id=$_POST['id'];
        $title = $_POST['title'];
        $current_image=$_POST['current_image'];
        $featured=$_POST['featured'];
        $active = $_POST['active'];

        //2. updating new image if selected
        //check wheteher the image is selected or not
        if(isset($_FILES['image']['name'])){
            //get the image details
            $image_name=$_FILES['image']['name'];

            //check whether the iamge is available or not
            if($image_name != ""){
                //image available
                //upload the new image

                //auto rename our image
                //get the extension of our image (jpg, png, etc.) e.g. "pic.png"
                $ext = end(explode('.', $image_name));

                //rename the image 52:21
                $image_name="Pic_Category_".rand(000,999).'.'.$ext; // e.g. pic_category_456.jpg
                
                $source_path=$_FILES['image']['tmp_name'];

                $destination_path="images/category/".$image_name;

                $target=move_uploaded_file($source_path, $destination_path);
                //remove the current image if available
                if($current_image!=""){
                    $remove_path = "images/category/".$current_image;

                    $remove=unlink($remove_path);

                    //check whether the iamge removed or not
                    //if failed to remove then display message and stop the process
                    if($remove==false){
                        //failed to remove image
                        $_SESSION['failed-remove']="<div class='error'>Failed to remove current image.</div>";
                        header('location:manage-category.php');
                        die();//stop the process
                    }
                }
            }else{
                $image_name=$current_image;
            }
        }else{
            $image_name=$current_image;
        }

        //3. update the database
        $conn2 = mysqli_connect(DB_HOST, DB_UPDATER, DB_UPD_PASS, DB_NAME);
        $sql2="UPDATE category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
            WHERE category_id=$id
        ";

        //execute the query
        $res2=mysqli_query($conn2, $sql2);

        //4. redirect to manage category with message
        //check whether executed or not
        if($res2){
            //category updated
            $_SESSION['update']="<div class='success'>Category updated successfully.</div>";
            header('location:manage-category.php');
        }else{
            //failed to update category
            $_SESSION['update']="<div class='error'>Failed to update category</div>";
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