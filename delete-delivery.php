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
        $sql="DELETE FROM delivery WHERE delivery_id=$delivery_id";
        $conn = mysqli_connect(DB_HOST, DB_DELETER, '', DB_NAME);
        $res = mysqli_query($conn, $sql);
        if($res){
            header('location:manage-delivery.php');
        }
    }
?>