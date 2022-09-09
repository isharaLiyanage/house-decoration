<?php session_start(); ?>
<?php require_once('../connection.php'); ?>



<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}




if (isset($_POST['submit'])) {
    $id_num = $_POST['read_num'];
    $quy = "UPDATE contact SET c_read = 0 WHERE c_id= '$id_num' LIMIT 1";
    $result_set = mysqli_query($connection, $quy);
}
?>

<?php
$query = "SELECT * FROM contact ORDER BY c_id DESC ";

$result_set = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
</head>

<body>
    <div class=" container">
        <div class="t text-center"><h3 class="h2">Admin Panel</h3></div>
        <div class="row m-5 p-3 ">
            <div class="col">
               <h6>Add New Blog - <a href="add-blog.php">Click</a> </h6>
            </div>
            <div class="col">
            <h6>Add New Picture For Gallery - <a href="submit-gallery.php">Click</a> </h6>

            </div>
        </div>

        <div class="row m-5 p-3 ">
            <div class="col">
               <h6>change admin - <a href="users.php">Click</a> </h6>
            </div>
            <div class="col">
            <h6>Change Blog - <a href="blog-gallery.php">Click</a> </h6>

            </div>
        </div>

       

        <div class="row">
          
            <?php
            while ($row = mysqli_fetch_array($result_set)) {
            ?>
                <div class=" col-lg-6 col-md-6 col-sm-12 border border-secondary p-2">
                    <div class="row justify-content-center <?php if ($row['c_read'] == 1) {
                                                                echo 'text-danger';
                                                            } else {
                                                                echo '';
                                                            }; ?>">

                        <div class="col">
                            <h4 class="h6">ID</h4>
                        </div>
                        <div class="col-4">
                            <p><?php echo "=  " . $row['c_id']; ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center">

                        <div class="col">
                            <h4 class="h6">Name</h4>
                        </div>
                        <div class="col-4">
                            <p><?php echo "=  " . $row['c_name']; ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            <h4 class="h6">Email</h4>
                        </div>
                        <div class="col">
                            <p><?php echo "=  " . $row['email']; ?></p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col">
                            <h4 class="h6">Mobile Number</h4>
                        </div>
                        <div class="col">
                            <p><?php echo "=  " . $row['mobile_num']; ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            <h4 class="h6">Date & time</h4>
                        </div>
                        <div class="col">
                            <p><?php echo "=  " . $row['date']; ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            <h4 class="h6">Massage</h4>
                        </div>
                        <div class="col">
                            <p class=" w-75"><?php echo "=  " . $row['msg']; ?></p>
                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-4">
                            <p>Mark as read</p>
                        </div>
                        <div class="col-2">
                            <form action="admin.php" method="post">
                                <input type="hidden" name="read_num" value="<?php echo $row['c_id']; ?>">
                                <button type="submit" class="btn btn-dark" name="submit" >0</button>

                            </form>
                        </div>
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
<?php mysqli_close($connection); ?>