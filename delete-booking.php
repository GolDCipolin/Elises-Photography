<?php
session_start();
require_once("protected/connection.php");
if(!isset($_SESSION['account_type'])){
    header('Location:/login.php');
    exit;
}else if($_SESSION['account_type'] !== 'staff'){
    header('Location:/mypage.php');
    exit;
}//end of if !isset
?>

<?php
    if(isset($_GET['id'])){
        $form_id=$_GET['id'];
        $sql="DELETE FROM form WHERE form_id=$form_id";
        $conn = mysqli_connect(DB_HOST, DB_DELETER, '', DB_NAME);
        $res = mysqli_query($conn, $sql);
        if($res){
            header('location:books.php');
        }
    }
?>