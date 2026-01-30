<?php
session_start();
require_once("protected/connection.php");
if(!isset($_SESSION['user_id'])){
    header("location: login.php");
    exit;
}else{
    $email=$_SESSION['email'];
    $user_id=$_SESSION['user_id'];
}//end of if session user id
?>

<?php
    if(isset($_GET['id'])){
        $order_num=$_GET['id'];
        $sql="DELETE FROM orders WHERE order_num=$order_num";
        $conn = mysqli_connect(DB_HOST, DB_DELETER, '', DB_NAME);
        $res = mysqli_query($conn, $sql);
        if($res){
            header('location:orders.php');
        }
    }
?>