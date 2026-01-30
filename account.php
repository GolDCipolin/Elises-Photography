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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/account.css">
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
<?php
    $sql="SELECT * FROM users WHERE `user_ID`=$user_id";
    $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
    $res = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($res);
    $fullname=$row['fullname'];
    $username=$row['username'];
?>
<section class="about">
    <section class="detail">
        <p class="name">
            Name
        </p>
        <p class="t_name">
            <?php echo $fullname; ?>
        </p>
        <p class="username">
            Username
        </p>
        <p class="t_username">
            <?php echo $username; ?>
        </p>
        <p class="email">
            Email
        </p>
        <p class="t_email">
            <?php echo $email; ?>
        </p>
        <p class="password">
            Password
        </p>
        <p class="t_password">
            *********************
        <p>
        <button class="edit" onclick="document.location='edit.php?id=<?php echo $user_id; ?>'">Edit</button>
    </section>
</section>

<section class="logout">
        <button class="order_button" onclick="document.location='orders.php'">Orders</button>
        <button class="order_button book_button" onclick="document.location='books.php'">Bookings</button>
        <button class="logout_button" onclick="document.location='logout.php'">Log Out</button>
</section>

<section class="d">
    <p class="d_title">
        Download History
    </p>
    <?php
        $sql2="SELECT * FROM orders WHERE `user_id`=$user_id";
        $conn2 = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res2 = mysqli_query($conn2, $sql2);
        $count2 = mysqli_num_rows($res2);
        if($count2){
            while($row2=mysqli_fetch_assoc($res2)){
                $type=$row2['type'];
                $picture_id=$row2['picture_id'];
                $price=$row2['price'];
                $sql3="SELECT image_name FROM picture WHERE picture_id=$picture_id";
                $conn3 = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                $res3 = mysqli_query($conn3, $sql3);
                $count3 = mysqli_num_rows($res3);
                if($count3){
                    while($row3=mysqli_fetch_assoc($res3)){
                        $image_name=$row3['image_name'];
                        if($type=='digital'){
                            ?>
                            <section class="d_img1">
                                <img src="images/pic/<?php echo $image_name; ?>" alt="" class="img1">
                                <p class="price1">£<?php echo $price; ?></p>
                                <a download="images/pic/<?php echo $image_name; ?>" href="images/pic/<?php echo $image_name; ?>" class="download">Download</a>
                            </section>
                            <?php
                        }
                    }
                }
            }
        }
    ?>
</section>

<section class="p">
    <p class="p_title">
        Purchase History
    </p>
    <?php
        $sql2="SELECT * FROM orders WHERE `user_id`=$user_id";
        $conn2 = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
        $res2 = mysqli_query($conn2, $sql2);
        $count2 = mysqli_num_rows($res2);
        if($count2){
            while($row2=mysqli_fetch_assoc($res2)){
                $type=$row2['type'];
                $picture_id=$row2['picture_id'];
                $price=$row2['price'];
                $sql3="SELECT image_name FROM picture WHERE picture_id=$picture_id";
                $conn3 = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                $res3 = mysqli_query($conn3, $sql3);
                $count3 = mysqli_num_rows($res3);
                if($count3){
                    while($row3=mysqli_fetch_assoc($res3)){
                        $image_name=$row3['image_name'];
                        ?>
                        <section class="p_img1">
                            <img src="images/pic/<?php echo $image_name; ?>" alt="" class="img1">
                            <p class="price1">£<?php echo $price; ?></p>
                            <button onclick="document.location='product.php?id=<?php echo $picture_id; ?>'" class="view">View</button>
                        </section>
                        <?php
                    }
                }
            }
        }
    ?>
</section>

<!-- end of base -->
<?php
require_once("footer.php");
?>
<!-- start of base -->
</div>
</body>
</html>
<!-- end of html -->