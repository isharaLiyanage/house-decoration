<?php session_start(); ?>
<?php require_once('../connection.php'); ?>
<?php require_once('functions.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
$errors = array();
$user_id = '';
$first_name = '';
$last_name  = '';
$email  = '';


if (isset($_GET['user_id'])) {
    //gettingthe user information
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $query = "SELECT * FROM user WHERE id = {$user_id} LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            //user found
            $result = mysqli_fetch_assoc($result_set);
            $first_name = $result['first_name'];
            $last_name  = $result['last_name'];
            $email  = $result['email'];
        } else {
            //user not found
            header('location: user.php?err=user_not_found');
        }
    } else {
        //Query usnccessful
        header('location: user.php?err=query_fialed');
    }
}





if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    //checking errors
    $req_fields = array('user_id', 'password');
    $errors = array_merge($errors, check_req_filds($req_fields));
    //checking max length
    $max_len_fields = array('password' => 50);

    $errors = array_merge($errors, check_max_len($max_len_fields));


    if (empty($errors)) {
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);






        $query = "UPDATE user SET ";

        $query .= "password = '{$hashed_password}' ";
        $query .= "WHERE id = {$user_id} LIMIT 1";

        $result = mysqli_query($connection, $query);

        if ($result) {
            //Query successful.... redirecting to user page
            header('Location: users.php?user_modifyed=true');
        } else {
            $errors[] = 'Failed to Upadate the record.';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
 
</head>

<body>

    <header>
        <div class="appname">Change Password</div>
        <div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?> <a href="logout.php">Log Out</a></div>
    </header>
    <main>
        <h1>Chage Password<span><a href="users.php">
                    < Back to user list </a></span></h1>
        <form action="change-password.php" method="POST" class="userform">
            <?php
            if (!empty($errors)) {
                dispaly_errors($errors);
            }
            ?>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <p>
                <label for="">First Name:</label>
                <input type="text" name="first_name" id="" <?php echo 'value="' . $first_name . '"'; ?>disabled>
            </p>
            <p>
                <label for="">Last Name:</label>
                <input type="text" name="last_name" id="" <?php echo 'value="' . $last_name . '"'; ?>disabled>
            </p>
            <p>
                <label for="">Email Address:</label>
                <input type="text" name="email" id="" <?php echo 'value="' . $email . '"'; ?>disabled>
            </p>
            <p>
                <label for="">New Password:</label>
                <input type="text" name="password" id="password">
            </p>
         
            <p>
                <label for="">&nbsp;</label>
                <button type="submit" name="submit" id="">Update Password</button>
            </p>
        </form>
    </main>
    <script src="js/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function() {
            $('#showpassword').click(function() {
                if ($('#showpassword').is(':checked')) {
                    $('#password').attr('type','text');
                } else {
                    $('#password').attr('type','password');
                }
            });

        });
       
    </script>
</body>

</html>