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

<h1 class="top">Add Picture</h1>

<?php
    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        // unset($_SESSION['upload']);
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <table>

        <tr class="form">
            <td class="text">Title: </td>
            <td>
                <input class="select" type="text" name="title" placeholder="Title of the picture">
            </td>
        </tr>

        <tr class="form">
            <td class="text desc">Description: </td>
            <td>
                <textarea class="select" name="description" id="" cols="30" rows="5" placeholder="Description of the image"></textarea>
            </td>
        </tr>

        <tr class="form">
            <td class="text">Price: </td>
            <td>
                <input class="select" type="number" name="price">
            </td>
        </tr>

        <tr class="form">
            <td class="text">Select Image: </td>
            <td>
               <input class="select" type="file" name="image" id="">
            </td>
        </tr>

        <tr class="form">
            <td class="text">Category: </td>
            <td>
                <select class="select" name="category">

                    <?php
                        //create php code to display categories from database
                        //1. create sql to get all active categories from database
                        $sql = "SELECT category_id, title FROM category";
                        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                        //executing query
                        $res=mysqli_query($conn, $sql);

                        //count rows to check whether we have categories or not
                        $count=mysqli_num_rows($res);

                        //if count is greater than zero, we have categories else we do not ahve categories
                        if($count>0){
                            //we have categories
                            while($row=mysqli_fetch_assoc($res)){
                                //get the details of categoires
                                $id = $row['category_id'];
                                $title = $row['title'];
                                ?>
                                <option class="select" value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                <?php
                            }
                        }else{
                            //we do not have category
                            ?>
                            <option class="select" value="0">No Category Found</option>
                            <?php 
                        }

                        //display on dropdown
                    ?>
                </select>
            </td>
        </tr>

        <tr class="form">
            <td class="text">Stock: </td>
            <td>
                <input class="select" type="number" name="status">
            </td>
        </tr>

        <tr class="form">
            <td colspan="2">
                <input type="submit" value="Add Image" name="submit" class="btn-secondary sub">
            </td>
        </tr>

    </table>

</form>

<?php

    //check wheter the button i sclicked or not
    if(isset($_POST['submit'])){
        //add the food in database
        // echo "clicked";

        //1. get the data from form
        $title=$_POST['title'];
        $desc=$_POST['description'];
        $price=$_POST['price'];
        $category=$_POST['category'];
        $status=$_POST['status'];


        //2. upload the iamge if selected
        //check wheether the select iamge i s clicked or not and upload the image only if the image is selected
      
        $image_name=$_FILES['image']['name'];
        //upload the iamge only if image is selected
        

        //auto rename our image
        //get the extension of our image (jpg, png, etc.) e.g. "pic.png"
        $ext = end(explode('.', $image_name));

        //rename the image 52:21
        $image_name="Pic_Image_".rand(000,999).'.'.$ext; // e.g. pic_category_456.jpg
        
        $source_path=$_FILES['image']['tmp_name'];

        $destination_path="images/pic/".$image_name;

        $target=move_uploaded_file($source_path, $destination_path);

        //3. insert into database
        //create a sql query to save or add image
        //for numerical we do not need to pass value inside quotes only for string value


        $sql2="INSERT INTO picture
            (title, `desc`, price, image_name, category_id, `status`)
            VALUES('$title','$desc',$price,'$image_name','$category','$status')
        ";

        //execute the query
        $conn2 = mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);
        $res2=mysqli_query($conn2, $sql2);
        //check whether data inserted or not

        //4. redirect the message to manage picture page
        if($res2){
            //data inserted successfully
            $_SESSION['add']="<div class='success'>Image/picture added sucessfully.</div>";
            header('location:manage-picture.php');
        }else{
            //failed to insert data
            $_SESSION['add']="<div class='error'>Failed to add image.</div>";
            header('location:manage-picture.php');
        }

        //make like button stuff

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