<?php session_start(); ?>

<?php require_once('../connection.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
}


$massege="";
if(isset($_POST['submit'])){

$g_name = mysqli_real_escape_string($connection,$_POST['g-name']);


$target_dir ="img/gallery/";
$target_file = $target_dir.basename($_FILES['g-file']["name"]);

// for image path

$target_dir_path ="../img/gallery/";
$target_file_path = $target_dir_path.basename($_FILES['g-file']["name"]);


move_uploaded_file($_FILES['g-file']["tmp_name"], $target_file_path);

$sql ="INSERT INTO gallerydb (gallery,gallery_name) VALUES ('$target_file','$g_name')";


if(mysqli_query($connection,$sql)){
$massege ="success";
}
else{
  $massege = "fail";
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>submit</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <div class="container  p-5">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="g-name" class="form-control" id="Name" required >
        <div id="emailHelp"  class="form-text">Image Alt Name.</div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="customFile">Upload</label>
        <input type="file" name="g-file" class="form-control" id="customFile" required>
      </div>
     
      <input type="submit" name="submit" class="btn btn-primary" value="add">
    </form>
    <?php

       echo '<h1>' , $massege , '</h1>';
?>
  </div>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>
<?php mysqli_close($connection); ?>
