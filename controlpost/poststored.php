h<?php
session_start();

include "../Database/env.php";


//collect
$Title=$_REQUEST["title"];
$Intro=$_REQUEST["intro"];
$Details=$_REQUEST["details"];
$Writer=$_REQUEST["writer"];

//validation

$errors=[];
// print_r($_REQUEST);
// exit();
//titleValidation
if(empty($Title)){
    $errors['titleError']= "no title";
} else if(strlen($Title) > 6){
   $errors['titleError']= "more than 6 characters";
}

// print_r(count($errors));

if(count($errors)>0)
{
    $_SESSION["old"]=$_REQUEST;

    $_SESSION["errors"]=$errors;

    //redirection
    header("Location:../index.php");
}
else{
    // // echo"no error found";
    // print_r($dbConn);

    $query="INSERT INTO posts(title, info, details, writer) VALUES ('$Title','$Intro','$Details','$Writer')";
    $response=mysqli_query($dbConn,$query);
    // var_dump($response);

    if($response){
        $_SESSION['msg']="your data has been inserted";
        header("location: ../index.php");
}
}