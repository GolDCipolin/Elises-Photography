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
</head>
<body>
<!-- end of base -->
<div class="wrapper">
<?php
require_once("header.php");
?>
<!-- start of base -->
<?php
    //1. get the id of selected admin
    $id=$_GET['id'];
    //2. create sql query to get the details
    $sql="SELECT fullname, username FROM users WHERE user_ID=$id";

    $conn = mysqli_connect(DB_HOST, DB_UPDATER, DB_UPD_PASS, DB_NAME);
    //execute the query
    $res=mysqli_query($conn, $sql);

    //check whether the query is executed or not
    if($res){
        //check whether the dta is available or not
        $count=mysqli_num_rows($res);
        //check whether we have admin data or not
        if($count){
            //Get the details
            //echo "Admin Available";
            $row=mysqli_fetch_assoc($res);

            $fullname = $row['fullname'];
            $username = $row['username'];
        }else{
            //redirect to manage admin page
            header("location:manage-admin.php");
        }
    }
?>
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Full Name: </td>
            <td>
                <input type="text" name="fullname" value="<?php echo $fullname; ?> ">
            </td>
        </tr>

        <tr>
            <td>Username: </td>
            <td>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name="user_ID" value="<?php echo $id?>">
                <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
            </td>
        </tr>
    </table>
</form>

<?php

    //check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        //echo 'Button pressed';
        //get all the values from form to update
        $id=$_POST['user_ID'];
        $fullname=$_POST['fullname'];
        $username=$_POST['username'];

        //create a SQL query to update admin
        $sql = "UPDATE users SET
        fullname = '$fullname',
        username = '$username'
        WHERE user_ID='$id'
        ";

        //execute the query
        $res=mysqli_query($conn, $sql);

        //check whether the qery executed successfully or not
        if($res){
            //query executed and admin updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //redirect to manage admin page
            header("location:manage-admin.php");
        }else{
            //faled to update
            $_SESSION['update'] = "<div class='error'>Failed to update admin.</div>";
            //redirect to manage admin page
            header("location:manage-admin.php");
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