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
<?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add']; //displaying session message
        unset($_SESSION['add']); //removing session message
    }

    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    if(isset($_SESSION['user-not-found'])){
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
    }

    if(isset($_SESSION['pwd-not-match'])){
        echo $_SESSION['pwd-not-match'];
        unset($_SESSION['pwd-not-match']);
    }
?>

<br /><br />
<a href="add-admin.php" class="btn-primary">Add Admin</a>
<br /><br /><br /><br />
<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Fullname</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>

    <?php
        //Query to Get all admin
        $sql = "SELECT user_ID, fullname, username FROM users";
        //Execute the Query
        $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res = mysqli_query($conn, $sql);

        //Check whether the Query is Executed of Not
        if($res){
            //Count rows to check whether w ehave data in database or not
            $count = mysqli_num_rows($res); // function to get all the rows in database

            //check the num of rows
            if($count>0){
                //we have data in database
                while($rows=mysqli_fetch_assoc($res)){
                    //using while loop to get all the data from database
                    //and while loop will run as long as we have data in database

                    //get individual data
                    $id=$rows['user_ID'];
                    $fullname=$rows['fullname'];
                    $username=$rows['username'];

                    //display the values in our table
                    ?>

                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $fullname; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                            <!-- <a href="update-password.php?&id=<?php echo $id; ?>" class="btn-primary">Change Password</a> -->
                            <a href="update-admin.php?&id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                            <a href="delete-admin.php?&id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                        </td>
                    </tr>                    

                    <?php
                }
            }else{
                //we do not have database
            }
        }else{
            echo mysqli_error($sql);
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