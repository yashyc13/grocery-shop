<?php
session_start();
include "db.php";


if (isset($_POST["Login"])) {
    // code...
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * from admin_login where email='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        //session_register("username");
        $_SESSION['login_user'] = $username;
        echo "Logged IN";
        header("location: admin-home.php");
    } else {
        echo  "Your Login Name or Password is invalid";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login Error</title>
</head>

<body style="background-color:#16191b;">
    <script type="text/javascript">
    Swal.fire({
        icon: 'error',
        text: 'Invalid login credentials!',
    }).then(function() {
        window.location.href = "index.html";
    })
    </script>
</body>

</html>