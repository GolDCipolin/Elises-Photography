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
<h1 class="top">Update Picture Details</h1>

<br><br>

<?php

    //check whether the id is set or not
    if(isset($_GET['id'])){
        //get the ID and all other detials
        //echo "Getting the data";
        $id = $_GET['id'];
        //create SQL query to get all other detials
        $sql = "SELECT * FROM picture WHERE picture_id=$id";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);

        //execute the query
        $res = mysqli_query($conn, $sql);

        //count the rows to check whether the id is valid or not
        $count=mysqli_num_rows($res);

        if($count){
            //get all the data
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $desc = $row['desc'];
            $price = $row['price'];
            $current_image = $row['image_name'];
            $category = $row['category_id'];
            $status=$row['status'];
        }else{
            //redirect to manage category with session message
            $_SESSION['no-picture-found'] = "<div class='error'>Picture not found.</div>";
            header('location:manage-picture.php');
        }


    }else{
        //redirect to manage picture
        header('location:manage-picture.php');
    }

?>

<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr class="form">
            <td class="text up">Title: </td>
            <td>
                <input class="select upi" type="text" name="title" value="<?php echo $title; ?>">
            </td>
        </tr>

        <tr class="form">
            <td class="text desc up">Description: </td>
            <td>
                <textarea class="select upi" name="desc" id="" cols="30" rows="5"><?php echo $desc; ?></textarea>
            </td>
        </tr>

        <tr class="form up">
            <td class="text up">Price: </td>
            <td>
                <input class="select upi" type="number" name="price" value="<?php echo $price; ?>">
            </td>
        </tr>

        <tr class="form">
            <td class="text up ci">Current Image: </td>
            <td>
                <?php
                    if($current_image != ""){
                        //display the image
                        ?>
                        <img class="select upi" src="images/pic/<?php echo $current_image; ?>" width="400px">
                        <?php
                    }else{
                        echo "<div class='error'>Image not added.</div>";
                    }
                ?>
            </td>
        </tr>

        <tr class="form">
            <td class="text up">New Image: </td>
            <td>
                <input class="select upi" type="file" name="image" value="<?php echo $current_image; ?>">
            </td>
        </tr>


        <tr class="form">
            <td class="text up">Category: </td>
            <td>
                <select class="select upi" name="category">

                    <?php
                        //create php code to display categories from database
                        //1. create sql to get all active categories from database
                        $sql3 = "SELECT category_id, title FROM category";
                        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                        //executing query
                        $res=mysqli_query($conn, $sql3);

                        //count rows to check whether we have categories or not
                        $count=mysqli_num_rows($res);

                        //if count is greater than zero, we have categories else we do not ahve categories
                        if($count>0){
                            //we have categories
                            while($row=mysqli_fetch_assoc($res)){
                                //get the details of categoires
                                $cat_id = $row['category_id'];
                                $title = $row['title'];
                                ?>
                                <option class="select upi" value="<?php echo $cat_id; ?>"><?php echo $title; ?></option>

                                <?php
                            }
                        }else{
                            //we do not have category
                            ?>
                            <option class="select upi" value="0">No Category Found</option>
                            <?php 
                        }

                        //display on dropdown
                    ?>
                </select>
            </td>
        </tr>

        <tr class="form">
            <td class="text up">Stock: </td>
            <td>
                <input class="select upi" type="number" name="status" value="<?php echo $status; ?>">
            </td>
        </tr>

        <tr class="form">
            <td>
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" value="Update Picture" class="btn-secondary sub">
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
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $current_image=$_POST['current_image'];
        $category=$_POST['category'];
        $status=$_POST['status'];


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
                $image_name="Pic_Image_".rand(000,999).'.'.$ext; // e.g. pic_category_456.jpg
                
                $source_path=$_FILES['image']['tmp_name'];

                $destination_path="images/pic/".$image_name;

                $target=move_uploaded_file($source_path, $destination_path);
                //remove the current image if available
                if($current_image!=""){
                    $remove_path = "images/pic/".$current_image;

                    $remove=unlink($remove_path);

                    //check whether the iamge removed or not
                    //if failed to remove then display message and stop the process
                    if($remove==false){
                        //failed to remove image
                        $_SESSION['failed-remove']="<div class='error'>Failed to remove current image.</div>";
                        header('location:manage-picture.php');
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
        $sql2="UPDATE picture SET
            title='$title',
            `desc`='$desc',
            price='$price',
            image_name='$image_name',
            category_id='$cat_id',
            `status`='$status'
            WHERE picture_id=$id
        ";

        //execute the query
        $res2=mysqli_query($conn2, $sql2);

        //4. redirect to manage category with message
        //check whether executed or not
        if($res2){
            //category updated
            $_SESSION['update']="<div class='success'>Image updates successfully</div>";
            header('location:manage-picture.php');
        }else{
            //failed to update category
            $_SESSION['update']="<div class='error'>Failed to update picture details</div>";
            header('location:manage-picture.php');
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