<?php

    $conn = mysqli_connect("localhost", "root", "", "photography");

    if(!$conn){
        echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able establish Database Connection</h3>";
    }

    $sql = "SELECT * FROM blog";
    $query = mysqli_query($conn, $sql);

    if(isset($_REQUEST["new_post"])){
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];
        $image_name = $_REQUEST["image"];

        $image_name=$_FILES['image']['name'];
        //upload the iamge only if image is selected
        

        //auto rename our image
        //get the extension of our image (jpg, png, etc.) e.g. "pic.png"
        $ext = end(explode('.', $image_name));

        //rename the image 52:21
        $image_name="Pic_Blog_".rand(000,999).'.'.$ext; // e.g. pic_category_456.jpg
        
        $source_path=$_FILES['image']['tmp_name'];

        $destination_path="images/blog/".$image_name;

        $target=move_uploaded_file($source_path, $destination_path);

        $sql = "INSERT INTO blog(title, content, image_name) VALUES('$title', '$content', '$image_name')";
        mysqli_query($conn, $sql);

        header("Location: blog-index.php?info=added");
        exit();
    }

    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM blog WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }

    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];

        $sql = "UPDATE blog SET title = '$title', content= '$content' WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: blog-index.php?info=updated");
        exit();
    }

    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM blog WHERE id = $id";
        $query = mysqli_query($conn, $sql);

        header("Location: blog-index.php?info=deleted");
        exit();
    }
?>