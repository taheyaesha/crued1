<?php

session_start();
include "./Database/env.php";

$id=$_REQUEST['post_id'];
$query = "SELECT * FROM posts WHERE id= $id";
$response = mysqli_query($dbConn,$query);

$post = mysqli_fetch_assoc($response);



// for showing 404
if($post){

}else {
    header("location:./Controlpost/404.php");
}

// echo "<pre>";
// print_r($post);
// echo "</pre>";

// exit();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    
<!-- nav bar starts here -->

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">Post System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./all posts.php">All Post</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- nav bar ends here -->

<!-- form  -->
<div class="card col-lg-5 mx-auto mt-5">
        <div class="card-header">Add Post</div>
        <div class="card-body">

        <form action="./controlpost/update.php" method="POST">
            

            <input type="hidden" name="id" value="<?= $post['id'] ?>">

            <input value="<?= $post['title'] ?>" name="title" type="text"  placeholder="Post Title" class="form-control my-3">
             <span class="text-danger">
             <?= isset($_SESSION['errors']['title_error']) ? $_SESSION['errors']['title_error'] : '' ?>
             </span>

             <input value="<?= $post['info'] ?>" name="info" type="text"  placeholder="Post Info" class="form-control my-3">
             <span class="text-danger">
             <?= isset($_SESSION['errors']['info_error']) ? $_SESSION['errors']['info_error'] : '' ?>
             </span>

            <textarea name="details" class="form-control my-3" placeholder="Post Details"><?= $post['details'] ?></textarea>
            <span class="text-danger">
             <?= isset($_SESSION['errors']['details_error']) ? $_SESSION['errors']['details_error'] : '' ?>
            </span>   

            <input value="<?= $post['writer'] ?>" name="writer" type="text" placeholder="Post writer" class="form-control my-3">
            <span class="text-danger">
             <?= isset($_SESSION['errors']['writer_error']) ? $_SESSION['errors']['writer_error'] : '' ?>
            </span>

            <button type ="submit" class="btn btn-primary">Update</button>
           
        </form>            
        </div>
    </div>
<!-- form ends -->




    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>




<?php

session_unset();

?>
