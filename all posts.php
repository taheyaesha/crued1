<?php
session_start();

include"./Database/env.php";
$query="SELECT * FROM posts";
$response=mysqli_query($dbConn,$query);
$posts=mysqli_fetch_all($response,1);  
// print_r($post)  ;
// exit();
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
          <a class="nav-link active" aria-current="page" href="./allpost.php">All posts</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
  <!-- navbar ends here -->

  <!-- form starts here -->
  <div class="card col-lg-8 mx-auto mt-5">
  <div class="card-header">All posts</div>
  <div class="card-body">

  <table class="table">
    <tr>
        <th>#</th>
        <th>writer</th>
        <th>title</th>
        <th>info</th>
        <th>details</th>

    </tr>
    <?php
    if(count($posts)>0){
    foreach($posts as $index=>$post){
      ?>
        <tr>
        <td><?= ++$index ?></td>
        <td><b>
          <img style="width: 30px; hight:30px; border-radius:50%; object-fit:cover;" src="https://api.dicebear.com/7.x/initials/svg?seed=<?=$post['writer']?>" alt="" class="">
          <?=$post['writer']?>

          </td>
        <td><?=$post['title']?></td>
        <td><?=$post['info']?></td>
        <td><?=strlen($post['details'])>11?substr($post['details'],0,11) . '...' :$post['details']?></td>
        <td>
                      <div class="btn-group">
                        <a class=" btn text-white btn-sm bg-success" href="./show.php?id=<?= $post["id"] ?>"> Show </a>
                        <a class=" btn text-white btn-sm bg-warning" href="./edit.php?post_id=<?= $post["id"] ?>"> Edit </a>
                        <a class=" btn text-white btn-sm bg-danger" href="./controlpost/delete.php?id=<?= $post["id"] ?>"> Delete </a>
                      </div>
                    </td>

    </tr>
    
    <?php
    
    };
  } else{
    ?>
     <tr> <td colspan="4" class="text-center"> <h5> no information😒 </h5> <td></tr>
  
    ?>

    
    

<?php
  };
  ?>
 </table>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
<?php
session_unset();
?>