<?php
session_start();
require_once("protected/connection.php");
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
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        
    }
?>

<form action="" method="post">

    <table class="tbl-30">
        <tr>
            <td>Current Password: </td>
            <td>
                <input type="password" name="current_password" placeholder="Current Password">
            </td>
        </tr>

        <tr>
            <td>New Password:</td>
            <td>
                <input type="password" name="new_password" placeholder="New Password">
            </td>
        </tr>

        <tr>
            <td>Confirm Password: </td>
            <td>
                <input type="password" name="confirm_password" placeholder="Confirm Password">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-secondary">
            </td>
        </tr>
    </table>
</form>

<?php
            //check whether the submit buttton is clicked or not
            if(isset($_POST['submit'])){
                //echo "Clicked";
                //1. get the data from form
                $id=$_POST['id'];
                $current_password=$_POST['current_password'];
                $new_password=$_POST['new_password'];
                $confirm_password=$_POST['confirm_password'];
                


                //2. check whther the suer with current ID and curfernt password exists or not
                $sql = "SELECT password, enc_pass FROM users WHERE user_ID=$id";
                
                //execute the query
                $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                $res = mysqli_query($conn, $sql);
                

                if($res){
                    //check whether data is available or not
                    $count=mysqli_num_rows($res);

                    if($count){
                        //user exists and password can be changed
                        //echo "User found";

                        //check whether the new password and confirm match or not
                        if($new_password==$confirm_password){
                            //update the password

                            //make the new password into argon2id

                        }else{
                            //redirect to manage admin page with error message
                            $_SESSION['pwd-not-match'] = "<div class='error'>Password did not match. </div>";
                            //redirect the user
                            header("location:manage-admin.php");
                        }
                    }else{
                        //user doesn't eixst set message and redirect
                        $_SESSION['user-not-found'] = "<div class='error'>User Not Found. echo id is $id;</div>";
                        //redirect the user
                        header("location:manage-admin.php");
                    }
                }
                //3. check whether the new password and confirm password match or not

                //4. Change password if all above is true
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