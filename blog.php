<?php require_once('connection.php'); ?>

<?php
if (isset($_GET['b-id'])) {
  $blog_ids = mysqli_real_escape_string($connection, $_GET['b-id']);
  $query = "SELECT * FROM blog WHERE id = '$blog_ids' LIMIT 1";
} else {
  $query = "SELECT * FROM blog ORDER BY id DESC LIMIT 1";
}
$result_set = mysqli_query($connection, $query);
if ($result_set) {

  $result = mysqli_fetch_assoc($result_set);
  $content = $result['content'];
}


// for Last blog post
$query_last = "SELECT * FROM blog ORDER BY id DESC LIMIT 3";
$result_set_last = mysqli_query($connection, $query_last);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog-Company</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <?php require_once('h&f/header.php'); ?>



  <div class="row mt-5">
    <div class="col-lg-2 col-md-2 col-sm-3">
      <div class="products row ">



        <?php
        while ($row = mysqli_fetch_array($result_set_last)) {


        ?>


          <div class="col-4 col-lg-12 col-md-12 col-sm-12">
            <a href="blog.php?b-id=<?php echo $row['id'] ?>" class=" text-decoration-none">
              <div class="card">
                <div class="card-body">
                  <img src="<?php echo $row['blog_img']; ?>" alt="" class=" img-fluid">
                  <h1 class="h6 text-center text-black"><?php echo $row['blog_name']; ?></h1>
                  <p class=" text-black-50"><?php
                                            $content_last = strip_tags(substr($row['content'], 0, 30));
                                            echo $content_last; ?></p>
                </div>
              </div>
            </a>
          </div>
        <?php
        }
        ?>


      </div>
    </div>

    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="container">
        <section>
          <?php
          echo $content;
          ?>
        </section>
      </div>
    </div>


    <div class="col-lg-2 col-md-2 col-sm-12">
      <div class="blog">
        <div class="card">
          <div class="card-body">
            <img data-original="img/interior-g34b4e5ad2_1920.jpg" alt="" class="img-fluid lazy">
            <p>Lorem nesciunt aliquid natus facere pariatur labore?</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container" style="margin-top: 20vh;">
    <?php require_once('h&f/footer.php'); ?>
  </div>


  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/main.js"></script>
  <script>

  </script>
</body>

</html>