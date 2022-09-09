<?php session_start(); ?>
<?php require_once('../connection.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
}

if (isset($_GET['b-id'])) {
  $blog_ids = mysqli_real_escape_string($connection, $_GET['b-id']);
  $query_doc = "SELECT * FROM blog WHERE id = '$blog_ids' ";
  $result_set = mysqli_query($connection, $query_doc);
  $result_doc = mysqli_fetch_assoc($result_set);
  $cont = $result_doc['content'];
  $cont_name = $result_doc['blog_name'];
  $cont_author = $result_doc['blog_author'];
}
if (!empty($cont_name)) {
  if (isset($_POST['submit'])) {

    $B_name = mysqli_real_escape_string($connection, $_POST['b-name']);
    $B_author = mysqli_real_escape_string($connection, $_POST['b-author']);

    if ($_FILES['b-file']['size'] == 0) {
    } else {
      $target_dir = "img/gallery/";

      $target_file = $target_dir . basename($_FILES['b-file']["name"]);


      // for image path
      $target_dir_path = "../img/gallery/";
      $target_file_path = $target_dir_path . basename($_FILES['b-file']["name"]);

      move_uploaded_file($_FILES['b-file']["tmp_name"], $target_file_path);
      $query_img = "UPDATE blog SET  blog_img ='$target_file' WHERE id = '{$blog_ids}' ";
      $result = mysqli_query($connection, $query_img);
    }
    $content = mysqli_real_escape_string($connection, $_POST['content']);
    $query = "UPDATE blog SET content = '{$content}' , blog_name = '$B_name' , blog_author = '$B_author'  WHERE id = '{$blog_ids}' ";

    $result = mysqli_query($connection, $query);
    echo $blog_ids . '<p>sdsdsdsdsd</p>';
    header('Location:blog-gallery.php');
  }
} else {
  if (isset($_POST['submit'])) {

    $B_name = mysqli_real_escape_string($connection, $_POST['b-name']);
    $B_author = mysqli_real_escape_string($connection, $_POST['b-author']);


    $target_dir = "img/gallery/";
    $target_file = $target_dir . basename($_FILES['b-file']["name"]);

    // for image path

    $target_dir_path = "../img/gallery/";
    $target_file_path = $target_dir_path . basename($_FILES['b-file']["name"]);

    move_uploaded_file($_FILES['b-file']["tmp_name"], $target_file_path);

    $content = mysqli_real_escape_string($connection, $_POST['content']);
    $query = "INSERT INTO blog (content,blog_name,blog_author,blog_img) VALUES ('$content','$B_name','$B_author',' $target_file')";

    $result = mysqli_query($connection, $query);
    header('Location:blog-gallery.php');
  }
  // $query ="SELECT * FROM blog";
  // $result_set = mysqli_query($connection, $query);
  // $result = mysqli_fetch_assoc($result_set);
  // $content =$result['content'];
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
        <label for="b-name" class="form-label">Blog Name</label>
        <input type="text" name="b-name" class="form-control" id="B-Name" value="<?php if (!empty($cont_name)) {
                                                                                    echo $cont_name;
                                                                                  } ?>" required>
        <div id="" class="form-text">BLog Title</div>
      </div>
      <div class="mb-3">
        <label for="b-author" class="form-label">Author</label>
        <input type="text" name="b-author" class="form-control" id="Name" value="<?php if (!empty($cont_name)) {
                                                                                    echo $cont_author;
                                                                                  } ?>" required>
        <div id="" class="form-text">Blog Author</div>
      </div>
      <div class="mb-3">
        <label class="form-label" for="customFile">Upload</label>
        <input type="file" name="b-file" class="form-control" id="b-file">
      </div>
      <p>
        <textarea name="content" id="" cols="100" rows="100">

<?php
if (!empty($cont)) {
  echo $cont;
}
?>
      
      </textarea>
      </p>
      <input type="submit" value="SAVE" name="submit">
    </form>


  </div>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="../ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('content');
  </script>
</body>

</html>
<?php mysqli_close($connection); ?>