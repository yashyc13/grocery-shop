<!DOCTYPE html>
<html>
<?php include 'session_check.php' ?>

<head>
    <meta charset="utf-8">
    <title>Total Items</title>
    <link rel="stylesheet" href="css/admin-home.css">
</head>

<body>
    <?php include 'admin-head.html' ?>
    <?php
    include "db.php";
    function TotalProducts()
    {
        global $conn;
        $sql = "SELECT * FROM product_details";
        $stmt = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($stmt);
        echo $rowcount;
    }

    function TotalNA()
    {
        global $conn;
        $sql1 = "SELECT * FROM not_available_items";
        $stmt1 = mysqli_query($conn, $sql1);
        $rowcount1 = mysqli_num_rows($stmt1);
        echo $rowcount1;
    }

    function TotalShortageItems()
    {
        global $conn;
        $sql2 = "SELECT * from product_details where product_quantity<=5  ";
        $stmt2 = mysqli_query($conn, $sql2);
        $rowcount2 = mysqli_num_rows($stmt2);
        echo $rowcount2;
    }
    ?>
    <div class="grid-container">
        <div class="grid-item"><a href="show-product.php">Total Products: <?php TotalProducts(); ?></div>
        <div class="grid-item"><a href="na-show.php">Not Available Items: <?php TotalNA(); ?> </a></div>
        <div class="grid-item"><a href="shortage-items.php">Total Shortage Items :<?php TotalShortageItems(); ?></div>
        <br>
    </div>
</body>
<?php include 'admin-footer.html' ?>

</html>