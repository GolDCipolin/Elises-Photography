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
<h1>Add Admin</h1>

<?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add']; //checking whether the session is set or not
        unset($_SESSION['add']); //remove sesison message
    }
?>

<form action="" method="POST">

    <table class="tbl-30">
        <tr>
            <td>Full Name: </td>
            <td><input type="text" name="fullname" placeholder="Enter your name"></td>
        </tr>
        
        <tr>
            <td>Username: </td>
            <td><input type="text" name="username" placeholder="Enter your username"></td>
        </tr>

        <tr>
            <td>Password: </td>
            <td><input type="password" name="password" placeholder="Your password"></td>
        </tr>

        <tr>
            <td>Email: </td>
            <td><input type="email" name="email" placeholder="Your email"></td>
        </tr>

        <tr>
            <td>Account Type: </td>
            <td><select name="account_type">
                    <option value="staff"></option>
                    <option value="customer"></option>
                </select></td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
            </td>
        </tr>
    </table>

</form>
<?php
    //Process the value from form and save it in database
    //check whether the submit button is clicked or not

    if(isset($_POST['submit'])){
        //button clicked
        // echo "button clicked";
        $options=[
            'memory_cost'=>2048,
            'time_cost'=>4,
            'threads'=>3,
        ];
        //1. get the data from from
        $fullname=$_POST['fullname'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $enc_pass=password_hash($password, PASSWORD_ARGON2ID, $options);
        $email=$_POST['email'];
        $account_type=$_POST['account_type'];

        //2. SQL query to save the data into database
        $sql = "INSERT INTO users SET
            fullname='$fullname',
            username='$username',
            password='$password',
            enc_pass='$enc_pass',
            email='$email',
            account_type='$account_type'
        ";
        
        //3. Execute query and save data in database        

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. check whether the data is inserted or not and display appropriate message
        if($res==TRUE){
            //Data inserted
            //echo "Data inserted";
            //Create a session variable to display message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect page to manage admin
            header("location:admin.php");
        }else{
            //Failed to insert data
            //echo "Failed to insert data";
            //Create a session variable to display message
            $_SESSION['add'] = "Failed to add admin";
            //Redirect page to add admin
            header("location:add-admin.php");
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