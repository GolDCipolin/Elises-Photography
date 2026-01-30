<!-- start of header -->
<nav class="nav nav--main">

    <a href="index.php" class="nav__link nav__link--normal">Home</a>
    <a href="about.php" class="nav__link nav__link--normal">About Me</a>
    <a href="gallery.php" class="nav__link nav__link--normal">Gallery</a>
<?php
    if(isset($_SESSION['account_type'])){
        $account_type = $_SESSION['account_type'];
        echo '<a href="basket.php" class="nav__link nav__link--normal">Basket</a>';
        echo '<a href="account.php" class="nav__link">Account</a>';
        echo '<a href="logout.php" class="nav__link">Logout</a>';
        if($account_type === 'staff'){
            echo '<a href="admin.php" class="nav__link">Admin</a>';
        }//end of if $account
    }else{
        echo '<a href="login.php" class="nav__link nav__link--normal">Sign In</a>';
    }//end of if isset account
?>
</nav>
<!-- end of header -->