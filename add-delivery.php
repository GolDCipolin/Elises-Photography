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

<h1 class="top">Add Delivery Service</h1>

<?php
    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        // unset($_SESSION['upload']);
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <table class="form">

        <tr>
            <td class="text">Delivery Service Name: </td>
            <td>
                <input class="select" type="text" name="name" placeholder="Name of delivery service">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input class="btn-secondary sub ad" type="submit" value="Add Delivery" name="submit">
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
        $name=$_POST['name'];
        //3. insert into database
        //create a sql query to save or add image
        //for numerical we do not need to pass value inside quotes only for string value


        $sql2="INSERT INTO delivery
            (delivery_name)
            VALUES('$name')
        ";

        //execute the query
        $conn2 = mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);
        $res2=mysqli_query($conn2, $sql2);
        //check whether data inserted or not

        //4. redirect the message to manage picture page
        if($res2){
            //data inserted successfully
            header('location:manage-delivery.php');
        }else{
            //failed to insert data
            header('location:manage-delivery.php');
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