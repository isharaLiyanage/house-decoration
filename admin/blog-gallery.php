<?php require_once('../connection.php'); ?>

<?php

$query = "SELECT * FROM blog ORDER BY id DESC";

$result_set = mysqli_query($connection, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog-Company</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <nav class="nav navbar-light navbar-expand-sm m-auto justify-content-between" style="max-width: 1000px;">
    <a class="navbar-brand m-2" href="#">COMPANY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false">
      <span class=" navbar-toggler-icon"></span>
    </button>
    <div class=" collapse navbar-collapse justify-content-end" id="navbar">

      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link " href="admin.php">HOME</a>
        </li>

      </ul>
    </div>
  </nav>
  <div class=" container">
    <div class="row mt-5 p-1">
      <?php
      while ($row = mysqli_fetch_array($result_set)) {

        $_content = strip_tags(substr($row['content'], 0, 30));
      ?>


        <div class="col">
          <div class="card">
            <a href="add-blog.php?b-id=<?php echo $row['id'] ?>" class=" text-decoration-none">

              <div class="card-body">
                <img src="../<?php echo $row['blog_img']; ?>" alt="" class="img-thumbnail">
                <h1 class="h5 text-center text-black"><?php echo $row['blog_name']; ?></h1>
                <p class=" text-black-50"><?php echo $_content; ?></p>
              </div>

            </a>
          </div>
        </div>


      <?php
      }
      ?>
    </div>
  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>