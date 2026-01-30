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
<br>
<a href="add-delivery.php" class="btn-primary">Add Delivery Service</a>
</br><br>
<table class="tbl-full">
    <tr>
        <th>Delivery ID</th>
        <th>Delivery Name</th>
    </tr>
    <?php
        $sql="SELECT * FROM delivery";
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count){
            while($row=mysqli_fetch_assoc($res)){
                $delivery_id=$row['delivery_id'];
                $delivery_name=$row['delivery_name'];
                ?>
                <tr>
                    <td><?php echo $delivery_id; ?></td>
                    <td><?php echo $delivery_name; ?></td>
                    <td>
                        <a href="update-delivery.php?id=<?php echo $delivery_id; ?>" class="btn-secondary">Change Delivery</a> <br> <br>
                        <a href="delete-delivery.php?id=<?php echo $delivery_id; ?>" class="btn-danger">Delete Delivery</a>
                    </td>
                </tr>
                <?php
            }
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