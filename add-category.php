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
    <title>Add Product Category</title>
</head>

<body>
    <?php include 'admin-head.html' ?>

    <form name="add-product" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
        <div class="add_prod" style="height: 500px; width:80%;padding: 10px;">
            <div style="margin-left: 100px;margin-top: 10px;">
                <h1 style="text-align: center;">Add Product Category</h1>
                <table cellspacing="10px">
                    <tr>
                        <td>
                            <label>Add Category</label><br>
                            <input type="text" name="product_category" required>
                        </td>
                    </tr>
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

    $product_category = $_POST['product_category'];

    $checkproduct = "SELECT * FROM product_cate where product_category='$product_category'";

    $res = mysqli_query($conn, $checkproduct);

    $row = mysqli_fetch_assoc($res);

    if (!strcasecmp($product_category, $row['product_category'])) {

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
        $sql = "INSERT INTO product_cate (product_category) VALUES('$product_category')";
        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>Swal.fire({icon: 'success',text: 'Product added successfully',}).then(function() {window.location.href = 'add-category.php';})</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $conn->close();
    }
}
?>