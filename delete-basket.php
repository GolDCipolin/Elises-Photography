<?php
session_start();
require_once("protected/connection.php");
?>

<?php
    //echo "Delete basket";
    if(isset($_GET['pic_id']) && isset($_GET['user_id'])){
        // echo "got both values";
        $user_id=$_GET['user_id'];
        $pic_id=$_GET['pic_id'];
        // echo $user_id;
        // echo $pic_id;

        $sql="DELETE FROM cart WHERE picture_id=$pic_id";

        $conn = mysqli_connect(DB_HOST, DB_DELETER, '', DB_NAME);
        $res=mysqli_query($conn, $sql);

        if($res){
            header('location:basket.php');
        }else{
            echo "didn't delete";
        }
    }
?>