<!DOCTYPE html>
<html lang="en">
<?php include 'session_check.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Admin Home</title>
</head>

<body>
    <?php include 'admin-head.html' ?>
    <div class="grid-container">
        <div class="grid-item"><i class="fa-solid fa-cart-plus"></i><a href="add-product.php"> Add Product</a></div>
        <div class="grid-item"><i class="fa-solid fa-boxes-stacked"></i><a href="show-product.php"> Show Products</a>
        </div>
        <div class="grid-item"><i class="fa-solid fa-cubes"></i><a href="update-product.php" target="_self"> Update
                Stock</a></div>
        <div class="grid-item"><i class="fa-solid fa-arrow-up-a-z"></i><a href="total-items.php"> Total Iteams</a>
        </div>
        <div class="grid-item"><i class="fa-solid fa-store"></i><a href="#"> Shop Profile</a></div>
        <div class="grid-item"><i class="fa-solid fa-arrow-trend-down"></i><a href="shortage-items.php"> Shortage
                Iteams</a></div>
        <div class="grid-item"><a href="near-expiry.php" target="_self">Near Expiry</a></div>
        <div class="grid-item"><a href="sold-and-update.php" target="_self">Bill Desk</a></div>
        <div class="grid-item"><i class="fa-solid fa-exclamation"></i><a href="not-available.php"> NA Iteams</a></div>
    </div>
    <?php include 'admin-footer.html' ?>
</body>

</html>