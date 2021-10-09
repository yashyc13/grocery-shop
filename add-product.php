<!DOCTYPE html>
<html lang="en">
<?php include 'session_check.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-home.css">
    <link rel="stylesheet" href="css/add-product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Add Product</title>
</head>

<body>
    <?php include 'admin-head.html' ?>

    <form name="add-product" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
        <div class="add_prod" style="height: 500px; width:80%;padding: 10px;">
            <div style="margin-left: 100px;margin-top: 10px;">
                <h1 style="text-align: center;">Add Product Details</h1>
                <table cellspacing="10px">
                    <tr>
                        <td>
                            <label>Product Name</label><br>
                            <input type="text" name="product_name" required>
                        </td>
                    </tr>
                    <td>
                        <label>Product Category</label><br>
                        <select name="product_category"
                            style="display: block;width: 50%;  margin: 5px 5px;  padding: 5px;  border-width: 0 2 2 2;border-color: skyblue;">
                            <?php
                            $sq = "select * from product_cate";
                            $query = mysqli_query($conn, $sq);
                            while ($res = mysqli_fetch_array($query)) {
                            ?>
                            <option><?php echo $res['product_category'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Expiry Date</label><br>
                            <input type="date" name="expiry_date" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Quantity</label><br>
                            <input type="number" name="product_quantity" required>
                        </td>
                    <tr>
                    <tr>
                        <td>
                            <label>MRP</label><br>
                            <input type="number" name="product_price" required>
                        </td>
                    <tr>
                    <tr>
                        <td>
                            <input type="submit" name="Add" value="Add Product">
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

<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $expiry_date = $_POST['expiry_date'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];

    $checkproduct = "SELECT * FROM product_details where product_name='$product_name'";
    $res = mysqli_query($conn, $checkproduct);

    $row = mysqli_fetch_assoc($res);
    if (!strcasecmp($product_name, $row['product_name'])) {
?>
<script type="text/javascript">
Swal.fire({
    icon: 'error',
    text: 'Product already exist',
}).then(function() {
    window.location.href = 'add-product.php';
})
</script>
<?php
    } else {

        $sql = "INSERT INTO product_details (product_name, product_category, expiry_date, product_quantity, product_price) VALUES('$product_name','$product_category', '$expiry_date', '$product_quantity' ,'  $product_price' )";
        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>Swal.fire({icon: 'success',text: 'Product added successfully',}).then(function() {window.location.href = 'add-product.php';})</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $conn->close();
    }
}
?>