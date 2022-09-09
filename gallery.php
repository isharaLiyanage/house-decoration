<?php require_once('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery-Company</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
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
              <a class="nav-link " href="index.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#FEATURES">FEATURES</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link active" href="#GALLERY">GALLERY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog-gallery.php">BLOG</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">SHOP</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
        </div>
      </nav>

   


      <?php
      $sql ="SELECT * FROM gallerydb";
      $result = mysqli_query($connection,$sql)
      ?>
      <div class="row w-75 m-auto">
    
          <?php
          while($row =mysqli_fetch_array($result)){
          ?>

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <img
            src="<?php echo $row['gallery'];?>"
            class="w-100 shadow-1-strong rounded mb-4"
            alt="<?php echo $row['gallery_name'];?>">
            
        </div>
        <?php } ?>
      </div>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>


</body>
</html>