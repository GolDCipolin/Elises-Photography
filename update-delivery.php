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
<?php
    if(isset($_GET['id'])){
        $delivery_id=$_GET['id'];
        $sql="SELECT * FROM delivery WHERE delivery_id=$delivery_id";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($res);
        $delivery_name=$row['delivery_name'];
    }
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
<h1 class="top">Update Delivery Service</h1>

<form action="" method="post" enctype="multipart/form-data">

    <table class="form">

        <tr>
            <td class="text">Delivery Service Name: </td>
            <td>
                <input class="select" type="text" name="name" value="<?php echo $delivery_name; ?>" placeholder="New name of delivery service" required>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input class="btn-secondary sub" type="submit" value="Update Delivery" name="submit" class="btn-secondary">
            </td>
        </tr>

    </table>

</form>
<?php
    if(isset($_POST['submit'])){
        // echo "hi";
        $delivery_name=$_POST['name'];

        $sql2="UPDATE delivery SET
        delivery_name='$delivery_name'
        WHERE delivery_id=$delivery_id
        ";
        $conn2 = mysqli_connect(DB_HOST, DB_UPDATER, DB_UPD_PASS, DB_NAME);
        $res2=mysqli_query($conn2, $sql2);
        if($res2){
            echo"<script> alert('Delivery detail updated');    
            window.location.href='manage-delivery.php';</script>";
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