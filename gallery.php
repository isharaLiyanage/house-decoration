<?php require_once('connection.php'); ?>





<?php require_once('h&f/header.php'); ?>




<?php
$sql = "SELECT * FROM gallerydb";
$result = mysqli_query($connection, $sql)
?>
<div class="row w-75 m-auto">

  <?php
  while ($row = mysqli_fetch_array($result)) {
  ?>

    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
      <img src="<?php echo $row['gallery']; ?>" class="w-100 shadow-1-strong rounded mb-4" alt="<?php echo $row['gallery_name']; ?>">

    </div>
  <?php } ?>
</div>