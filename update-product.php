<!DOCTYPE html>
<html lang="en">
<?php include 'session_check.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/update-product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <title>Update Product Details</title>
    <style>
    .container {
        position: relative;
        overflow: scroll;
    }
    </style>
</head>

<body>
    <?php include 'admin-head.html' ?>
    <div class="product_details">
        <h1 class="text-center text-white">Update Product Details</h1>

        <div class="container">

            <table class="table table-striped table-dark">
                <thead>



                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Category</th>
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">MRP</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    include "db.php";
                    $sql = "SELECT * FROM product_details ";
                    $retVal = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($retVal)) {
                    ?>
                    <tr>
                        <td><?php echo $row['product_name']  ?></td>
                        <td><?php echo $row['product_category'] ?></td>
                        <td><?php echo $row['expiry_date'] ?></td>
                        <td><?php echo $row['product_quantity'] ?></td>
                        <td><?php echo $row['product_price'] ?></td>
                        <td><button class="btn btn-primary" name="Add"><a target="_self"
                                    href="update.php?id=<?php echo $row['id']; ?>"
                                    class="text-white">Update</a></button></td>
                        <td><button class="btn btn-danger" name="Delete_Data"><a target="_self"
                                    href="update.php?id=<?php echo $row['id']; ?>"
                                    class="text-white">Delete</a></button></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>
</body>

</html>