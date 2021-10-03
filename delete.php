<?php
include "db.php";

if (isset($_POST["delete_data"])) {

    $product_name = $_POST['product_name'];

    echo "this is delete page";

    $sql2 = "DELETE FROM product_details where product_name='$product_name' ";

    if (mysqli_query($conn, $sql2)) {
        echo "<script> alert('Record Deleted successfully') </script>";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
    header('location:update-product.php');
}