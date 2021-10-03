<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/update-product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <title>Update Product Details</title>
</head>

<body>
    <?php include 'admin-head.html' ?>
    <div class="product_details">
        <h1>Update Product Details</h1>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Company</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">MRP</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <?php
            include "db.php";
            $sql = "SELECT * FROM product_details ";
            $retVal = mysqli_query($conn, $sql);

            if (!$retVal) {
                die('Could not get data: ');
            }
            ?>
            <?php
            while ($row = mysqli_fetch_assoc($retVal)) {
            ?>
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                <?php
                echo "
   		<tbody>
   			<tr>               
   				<td ><input type='text' value=" . $row['product_name'] . " name='product_name' ></td>
   				<td><input type='text' value=" . $row['company_name'] . " name='company_name'  '></td>
   				<td><input type='text' value=" . $row['expiry_date'] . " name='expiry_date' ></td>
   				<td><input type='text' value=" . $row['product_quantity'] . " name='product_quantity' ></td>
   				<td><input type='text' value=" . $row['product_price'] . " name='product_price' ></td>
                <td><input type='submit' value='Update' name='Update_Data'></td>
                <td><input type='submit' value='Delete' name='Delete_Data'></td>
   			</tr>
   		</tbody>";
            }
                ?>
                </tbody>
        </table>

    </div>
</body>

</html>

<?php

if (isset($_POST["Update_Data"])) {

    $product_name = $_POST['product_name'];
    $company_name = $_POST['company_name'];
    $expiry_date = $_POST['expiry_date'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];

    $sql = "UPDATE product_details SET product_name='$product_name',company_name='$company_name', expiry_date='$expiry_date', product_quantity='$product_quantity' ,product_price='$product_price' WHERE product_name='$product_name' ";
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Record Updated successfully') </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $conn->close();
}

if (isset($_POST["Delete_Data"])) {
    $product_name = $_POST['product_name'];

    $sql2 = "DELETE FROM product_details where product_name='$product_name' ";

    if (mysqli_query($conn, $sql2)) {
        echo "<script> alert('Record Deleted successfully') </script>";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
}

?>