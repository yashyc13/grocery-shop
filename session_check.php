<?php
session_start();
include "db.php";

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($conn, "select * from admin_login where email = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['email'];

if (!isset($_SESSION['login_user'])) {
    header("location:index.html");
    die();
}