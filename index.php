<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post System</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
 

  <!-- navbar starts from here -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Post System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./all posts.php">All posts</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
  <!-- navbar ends here -->

  <!-- form starts here -->
  <div class="card col-lg-4 mx-auto mt-3">
  <div class="card-header">Add post</div>
  <div class="card-body">

  <form action="./controlpost/poststored.php" method="Post">
    <input value="<?=$_SESSION['old']['title']??' ' ?>" name="title" type="text" placeholder="Post Title" class="form-control my-3">
    <?php 
    if(isset($_SESSION['errors']['titleError']))
    { ?>
    <span class="text-danger">
    <?=$_SESSION['errors']['titleError'];?>

    </span>
    <?php
    }
    ?>
   
    <input value="<?=$_SESSION['old']['intro']??' ' ?>"name="intro" type="text" placeholder="Introduction" class="form-control my-3">
    
    <textarea  name="details" placeholder="Post Detail"  class="form-control my-3"><?=$_SESSION['old']['details']??' ' ?></textarea>
    <input value="<?=$_SESSION['old']['writer']??' ' ?>" name="writer" type="text" placeholder="Post writer" class="form-control my-3">
    <button type="submit"class="btn btn-primary">Submit</button><br>
    </div>

    <span class='text-success'>
      <?= isset( $_SESSION['msg']) ? $_SESSION['msg']: ''?>
    </span>

  </form>



</div>
</div>
<!-- form ends -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
<?php
session_unset();
?>