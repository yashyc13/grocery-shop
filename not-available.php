<?php include 'session_check.php' ?>
<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $request_date = $_POST['request_date'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];

    $checkproduct = "SELECT * FROM not_available_items where product_name='$product_name'";
    $res = mysqli_query($conn, $checkproduct);

    $row = mysqli_fetch_assoc($res);
    if ($product_name == $row['product_name']) {
?>
<script type="text/javascript">
alert("product alredy exist")
</script>
<?php
    } else {

        $sql = "INSERT INTO not_available_items (product_name, request_date, product_quantity, product_price) VALUES('$product_name', '$request_date', '$product_quantity' ,'  $product_price' )";
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('New record created successfully') </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-home.css">

    <link rel="stylesheet" type="text/css" href="css/add-product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Return customer</title>

</head>

<body>
    <?php include 'admin-head.html' ?>






    <form name="add-product" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
        <div class="add_prod" style="height: 500px; width:80%;padding: 10px;">
            <div style="margin-left: 100px;margin-top: 10px;">
                <h2>Add the Product that are not avalible</h2>
                <table cellspacing="10px">


                    <tr>
                        <td>
                            <label>Product Name</label><br>
                            <input type="text" name="product_name" required>
                        </td>
                        <td>
                            <button><a href="Na-show.php" target="_self">Show Product</a></button>
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

                    <tr>
                        <td>
                            <label>Date</label><br>
                            <input type="date" name="request_date">
                        </td>
                    <tr>

                    <tr>
                        <td>
                            <input type="submit" name="Add" value="Submit">
                            <input type="reset" name="Reset" style="position: relative; top:3px">
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