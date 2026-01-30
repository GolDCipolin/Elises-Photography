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

<br /><br />
<a href="add-picture.php" class="btn-primary">Add Picture</a>
<br /><br /><br /><br />

<?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
    
    if(isset($_SESSION['no-picture-found'])){
        echo $_SESSION['no-picture-found'];
        unset($_SESSION['no-picture-found']);
    }


    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    if(isset($_SESSION['failed-remove'])){
        echo $_SESSION['failed-remove'];
        unset($_SESSION['failed-remove']);
    }

?>
<table class="tbl-full">
    <tr>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>

<?php
    $sql = "SELECT picture_id, title, `desc`, price, image_name, category_id, `status` FROM picture";
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
            $id=$row['picture_id'];
            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];
            $status=$row['status'];

            ?>

            <tr>
                <td><?php echo $title; ?></td>
                <td>
                    <?php
                        //check whether image name is avialble or not
                        if($image_name!=""){
                            //display the image
                            ?>

                            <img src="images/pic/<?php echo $image_name; ?>" width="300px">

                            <?php
                        }else{
                            //display the message
                            echo "<div class='error'>Image not added.</div>";
                        }
                    ?>
                </td>
                <td><?php echo $price; ?></td>
                <td><?php echo $status;
                    if($status<=5){
                        echo "<p class='warning'>LOW STOCK</p>";
                    }?>
                </td>
                <td>
                    <a href="update-picture.php?id=<?php echo $id; ?>" class="btn-secondary">Update Picture</a> <br> <br>
                    <a href="admin/delete-picture.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Picture</a>
                </td>
            </tr>
        <?php
        }
    }else{
        //we do not have data
        //we will display the message inside table
        ?>
        <tr>
            <td colspan="4"><div class="error">No Picture Added.</div></td>
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