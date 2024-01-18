<?php
session_start();
include "../Database/env.php";

//collect
$Title=$_REQUEST["title"];
$Intro=$_REQUEST["info"];
$Details=$_REQUEST["details"];
$Writer=$_REQUEST["writer"];
$id=$_REQUEST["id"];

//array_initialise
$errors=[];
//validation
if(empty($Title)){
    $errors['titleError']= "no title";
} 
if(empty($Intro)){
    $errors['introError']= "no intro";
} 
if(empty($Detail)){
    $errors['detailError']= "no details";
} 
if(strlen($Writer)>50){
    $errors['writerError']= "name is too long";
} 
if(count($errors)>0)
{ //redirect_back
    $_SESSION["errors"]=$errors;
    header("Location:../edit.php?post_id=$id");
}
else {
    //procceed
    $query="UPDATE posts SET title='$Title',info='$Intro',details='$Details',writer='$Writer' WHERE id=$id ";
    $resp = mysqli_query($dbConn,$query);


    
}
if($resp){
       
    header("location: ../all posts.php");
}



