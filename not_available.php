<?php
include('db.php');
if (isset($_POST['Add'])) {
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];
    // $customer_count = $_POST['custemor_count'];
    // $customer_date = $_POST['request_date'];

    $sql = "INSERT INTO not_avaiable_items (product_name, product_quantity, product_price, customer_count, request_date)
     VALUES ('$product_name','$product_quantity','$product_price','$customer_count','$customer_date')";

    mysqli_query($conn, $sql);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-home.css">
    <link rel="stylesheet" href="css/add-product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Return customer</title>
</head>

<body>
    <?php include 'admin-head.html' ?>

    <form name="add-product" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
        <div class="add_prod" style="height: 500px; width:80%;padding: 10px;">
            <div style="margin-left: 100px;margin-top: 10px;">
                <table cellspacing="10px">


                    <tr>
                        <td>
                            <label>Product Name</label><br>
                            <input type="text" name="product_name" required>
                            <span id="productError" style="color:red;"></span>
                        </td>
                    </tr>
                    <td>
                        <label>Product Quantity</label><br>
                        <input type="number" name="product_quantity" required>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Product Price</label><br>
                            <input type="number" name="product_price" required>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>
                            <label>Customer Count</label><br>
                            <input type="number" name="custmer_count" required>
                        </td>
                    <tr> -->
                    <!-- <tr>
                        <td>
                            <label>Date</label><br>
                            <input type="date" name="request_date" required>
                        </td>
                    <tr> -->

                    <tr>
                        <td>
                            <input type="submit" name="Add" value="Submit">
                        </td>
                        <td>
                            <input type="reset" name="Reset">
                        </td>
                    </tr>
                </table>
            </div>
            <br>
        </div>
    </form>

    <?php include 'admin-footer.html' ?>
</body>

</html>