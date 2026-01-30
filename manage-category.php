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
<?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add']; //displaying session message
        unset($_SESSION['add']); //removing session message
    }

    if(isset($_SESSION['remove'])){
        echo $_SESSION['remove']; //displaying session message
        unset($_SESSION['remove']); //removing session message
    }

    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete']; //displaying session message
        unset($_SESSION['delete']); //removing session message
    }

    if(isset($_SESSION['no-category-found'])){
        echo $_SESSION['no-category-found'];
        unset($_SESSION['no-category-found']);
    }
    
    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }

    if(isset($_SESSION['failed-remove'])){
        echo $_SESSION['failed-remove'];
        unset($_SESSION['failed-remove']);
    }
?>
<br /><br />
<a href="add-category.php" class="btn-primary">Add Category</a>
<br /><br /><br /><br />
<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Image</th>
    </tr>

    <?php

        $sql = "SELECT category_id, title, image_name FROM category";

        //execute query
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);

        //count rows
        $count = mysqli_num_rows($res);

        //check whether we have data in database or not
        if($count>0){
            //we have data in database
            //get the data and display
            while($row=mysqli_fetch_assoc($res)){
                $id=$row['category_id'];
                $title=$row['title'];
                $image_name=$row['image_name'];

                ?>

                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $title; ?></td>
                        <td>
                            <?php
                                //check whether image name is available or not
                                if($image_name!=""){
                                    //display the image
                                    ?>

                                    <img src="images/category/<?php echo $image_name; ?>" width="300px">
                                    
                                    <?php
                                }else{
                                    //display the message
                                    echo "<div class='error'>Image not added.</div>";
                                }
                            ?>
                        </td>

                        <td>
                            <a href="update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a> <br> <br>
                            <a href="admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                        </td>
                    </tr>

                <?php
            }

        }else{
            //we do not have data
            //we will display the mssage inside table
            ?>

            <tr>
                <td colspan="4"><div class="error">No Category Added.</div></td>
            </tr>

            <?php
        }

    ?>



 
</table>

<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->