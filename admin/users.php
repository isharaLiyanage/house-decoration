<?php session_start(); ?>
<?php require_once('../connection.php'); ?>
<?php require_once('functions.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
$user_list = '';
$search='';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $query = "SELECT * FROM user WHERE (first_name LIKE '%{$search}%' OR last_name LIKE '%{$search}%' OR
     email LIKE '%{$search}%') AND is_deleted=0 ORDER BY first_name";
} else {
    //gettig the list of user
    $query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name";
}
$users = mysqli_query($connection, $query);
verify_query($users);
while ($user = mysqli_fetch_assoc($users)) {
    $user_list .= "<tr>";
    $user_list .= "<td>{$user['first_name']}</td>";
    $user_list .= "<td>{$user['last_name']}</td>";
    $user_list .= "<td>{$user['last_login']}</td>";
    $user_list .= "<td><a href=\"modify-user.php?user_id={$user['id']}\">Edit</a></td>";
    $user_list .= "</tr>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <header>
        <div class="appname">User Management system</div>
        <div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?> <a href="logout.php">Log Out</a></div>
    </header>
    <main>

     
            <form action="users.php" method="get">
            
            </form>
            </p>
        </div>
        <table class="masterlist">
            <tr>
                <th>Frist Name</th>
                <th>Last Name</th>
                <th>Last Login</th>
                <th>Edit</th>
                
            </tr>
            <?php echo $user_list; ?>
        </table>
    </main>
</body>

</html>