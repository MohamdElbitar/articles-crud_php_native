<?php
session_start();
    require_once "conn.php";
    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $body = $_POST['body'];
        
        $image = $_POST['image'];
        $user_id =$_SESSION["uid"];
        $folder = "./images/" . $image;

        if($title != "" && $description != "" && $body != "" && $image != "" ){
            $sql = "INSERT INTO articles (`title`, `description`, `image`,body,user_id) VALUES ('$title', '$description','$image', '$body','$user_id')";
            if (mysqli_query($conn, $sql)) {
                header("location: index.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
        }else{
            echo "Article, Auther and Image cannot be empty!";
        }
    }
?>