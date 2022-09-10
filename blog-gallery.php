<?php require_once('connection.php'); ?>

<?php

$query = "SELECT * FROM blog ORDER BY id DESC";

$result_set = mysqli_query($connection, $query);

?>



<?php require_once('h&f/header.php'); ?>
<div class="row mt-5 p-1">
  <?php
  while ($row = mysqli_fetch_array($result_set)) {

    $_content = strip_tags(substr($row['content'], 0, 50));
  ?>


    <div class="col">
      <div class="card">
        <a href="blog.php?b-id=<?php echo $row['id'] ?>" class=" text-decoration-none">
          <div class="card-body">
            <img src="<?php echo $row['blog_img']; ?>" alt="" class="img-thumbnail">
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

<div class="container" style="margin-top: 20vh;">
  <?php require_once('h&f/footer.php'); ?>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>