<?php
session_start();
require_once("../protected/connection.php");
if(!isset($_SESSION['account_type'])){
    header('Location:../login.php');
    exit;
}else if($_SESSION['account_type'] !== 'staff'){
    header('Location:../account.php');
    exit;
}//end of if !isset
?>

<?php

    // echo "Delete picture";
    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) && isset($_GET['image_name'])){
        //get the value and delete
        //echo "Get value and delete";
        $id = $_GET['id'];
        $image_name=$_GET['image_name'];

        //remove the physical image file available
        if($image_name != ""){
            //image is available so remove it
            $path = "../images/pic/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove iamge then add an error message and stop the process
            if($remove == false){
                //set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to remove picture image. echo unlink($path);</div>";
                //redirect to manage category page
                header('location:../manage-picture.php');
                //stop the process
                die();
            }
        }

        //delete fata from databse
        //sql eury to delete data from database
        
        $sql = "DELETE FROM picture WHERE picture_id=$id";
        
        $conn = mysqli_connect(DB_HOST, DB_DELETER, '', DB_NAME);
        //execute the query
        $res = mysqli_query($conn, $sql);

        //check whether the data is delete from databse or not
        if($res){
            //set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Picture Deleted Successfully.</div>";
            //redirect to manage category
            header('location:../manage-picture.php');
        }else{
            //redirect to manage category page
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Picture.</div>";
            //redirect to manage category
            header('location:../manage-picture.php');
        }
        //redirect to manage category page with message
    }else{
        //redirect to manage category page
        header('location:../manage-picture.php');
    }
?>