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
    <link rel="stylesheet" href="css/bw_product1.css">
    <script src="js/product.js"></script>
</head>
<body>
<!-- end of base -->
<div class="wrapper">

<?php
require_once("header.php");
?>
<!-- start of base -->
<?php
    $id = $_GET['id']; #the image ID (picture_ID)
    $sql = "SELECT * FROM picture WHERE picture_id=$id";
    $conn = mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
    $res = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($res);
    $title=$row['title'];
    $desc=$row['desc'];
    $price=$row['price'];
    $image_name=$row['image_name'];
    $status=$row['status'];
?>
<section class="product_box">
    <img src="images/pic/<?php echo $image_name; ?>" class="big-img">
    <p class="bw_title">
        <?php echo $title; ?>
        <p class="bw_desc">
        <?php echo $desc; ?>
        </p>
    </p>
    <section class="cost">
        <p class="cost-text">
            £<?php echo $price; ?>
        </p>
    </section>
    <!-- button -->
    <form action="" method="post">
        <?php
            if(isset($_SESSION['user_id'])){
                echo "<button type='submit' class='like' name='like'>";
                $user_id=$_SESSION['user_id'];
                $sql2="SELECT `user_ID`, picture_id FROM likes WHERE `user_ID` = '$user_id' AND picture_id='$id'";
                $conn2=mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                $res2=mysqli_query($conn2, $sql2);
                $count2=mysqli_num_rows($res2);
                
                if(!$count2){ //if the user hasn't liked it
                    ?>
                    Like (<?php
                    $conn2=mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                    $sql_count="SELECT picture_id FROM likes WHERE picture_id='$id'";
                    if($res_count=mysqli_query($conn2, $sql_count)){
                        $count=mysqli_num_rows($res_count);
                        echo $count;
                    }
                    ?>)
                    <?php
                }else{ //if user has liked it
                    ?>
                    Liked (<?php
                    $conn2=mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
                    $sql_count="SELECT picture_id FROM likes WHERE picture_id='$id'";
                    if($res_count=mysqli_query($conn2, $sql_count)){
                        $count=mysqli_num_rows($res_count);
                        echo $count;
                    }
                    ?>)
                    <?php
                }
                ?>
                </button>
                <?php
            }
        
        ?>
    </form>
    <!-- <button class="like">Like</button> -->
    <!-- button -->
    <form action="" method="POST" enctype="multipart/form-data">
        <label class="qty" for="qty">Qty</label>
        <input type="number" min="1" max="<?php echo $status; ?>" name="quantity" class="cars" value="1">
        <label class="framed" name="framed" for="framed">Framed</label>
        <select name="frame" id="frame" class="frame">
            <option value="no_frame">Don't Frame</option>
            <option value="frame">Framed</option>
        </select>
        <label class="type" for="type">Type/Size</label>
        <select name="type" id="type" class="type1">
            <option value="digital">Digital - HD</option>
            <option value="a1">A1</option>
            <option value="a2">A2</option>
            <option value="a3">A3</option>
            <option value="a4">A4</option>
        </select><br>
        <br><br>
        <?php
            if($status==0){
                echo "<p class='ooo'>Image out of stock</p>";
            }else{
                ?>
                <input class="Buy" name="submit" type="submit" value="Add To Cart">
            <?php
            }
?>
    </form>
</section>


<!------------------ LIKE BUTTON ---------------------->
<?php
    if(isset($_POST['like'])){
        // echo "Hello";
        if(isset($_SESSION['user_id'])){
            //user_id is for the user and id is for the picture id
            $user_id=$_SESSION['user_id'];
            $sql2="SELECT `user_ID`, picture_id FROM likes WHERE `user_ID` = '$user_id' AND picture_id='$id'";
            $conn2=mysqli_connect(DB_HOST, DB_SELECTER, DB_SEL_PASS, DB_NAME);
            $res2=mysqli_query($conn2, $sql2);
            $count2=mysqli_num_rows($res2);
            
            if(!$count2){ //if the user id and picture id doesn't exist then add to table
                $sql="INSERT INTO likes
                (`user_ID`, picture_id)
                VALUES('$user_id','$id')
                ";
                $conn=mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);
                $res=mysqli_query($conn, $sql);
                header('Location: '.$_SERVER['REQUEST_URI']);
            }else{ //if it doesn't then delete it
                $sql3="DELETE FROM likes WHERE `user_ID` = '$user_id' AND picture_id='$id'";
                $conn3=mysqli_connect(DB_HOST, DB_DELETER, '', DB_NAME);
                $res3=mysqli_query($conn3, $sql3);
                header('Location: '.$_SERVER['REQUEST_URI']);
            }
        }        
    }
?>


<!------------------ ADD CART BUTTON ---------------------->
<?php
    if(isset($_POST['submit'])){
        // echo "HELO";
        if(!isset($_SESSION['user_id'])){ //USER MUST BE LOGGED IN IF THEY WANT TO PURCHASE OR ADD TO BASKET
            header('Location:login.php');
        }else{ //IF THEY ARE LOGGED IN
            $qty=$_POST['quantity'];
            $frame=$_POST['frame'];
            $type=$_POST['type'];

            $sql4="INSERT INTO cart
            (`user_ID`, `picture_id`,image_name, `type`, frame, quantity, price)
            VALUES('$user_id','$id','$image_name','$type','$frame','$qty','$price')
            ";

            $conn=mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);
            $res=mysqli_query($conn, $sql4);

            if($res){
                header('location:basket.php');
            }else{
                header('location:index.php');
            }
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