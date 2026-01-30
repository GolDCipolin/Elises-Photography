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
    //get the ID of admin to be deleted
    $id = $_GET['id'];
    //create sql query to delete admin
    $sql = "DELETE FROM users WHERE user_ID=$id";

    $conn = mysqli_connect(DB_HOST, DB_DELETER, '', DB_NAME);
    //execute the query
    $res = mysqli_query($conn, $sql);

    //check whehter the query executed successfully or not
    if($res){
        //Query executed successfully and admin deleted
        //echo "Admin Deleted";
        //Create session variable to display message
        $_SESSION['delete'] = "Admin Deleted Successfully";
        //redirect to manage admin page
        header("location:admin.php");
    }else{
        //echo "Failed to delete admin";

        $_SESSION['delete'] = "Failed to delete admin, Try Again";
        header("location:admin.php");
    }
?>