<?php
include "../Database/env.php";
$id=$_REQUEST['id'];
$query="DELETE FROM posts WHERE id=$id";
$response = mysqli_query($dbConn,$query);
if($response){
    header("location: ../all posts.php");
}



