<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-home.css">
    <link rel="stylesheet" href="css/add-product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Update</title>
</head>

<body>
    <?php include 'admin-head.html' ?>

    <form name="add-product" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
        <div class="add_prod" style="height: 500px; width:80%;padding: 10px;">
            <div style="margin-left: 100px;margin-top: 10px;">
                <table cellspacing="10px">
                    <?php
                    include "db.php";
                    if (isset($_POST["Add"])) {


                        $id = $_GET['id'];
                        $product_name = $_POST['product_name'];
                        $company_name = $_POST['company_name'];
                        $expiry_date = $_POST['expiry_date'];
                        $product_quantity = $_POST['product_quantity'];
                        $product_price = $_POST['product_price'];

                        $sql = "UPDATE product_details SET product_name='$product_name',company_name='$company_name', expiry_date='$expiry_date', product_quantity='$product_quantity' ,product_price='$product_price' WHERE id='$id' ";
                        if (mysqli_query($conn, $sql)) {
                            echo " <script type='text/javascript'>Swal.fire({icon: 'success',text: 'Data Updated successfully',}).then(function() {window.location.href = 'update-product.php';})</script>";
                        }
                    }

                    if (isset($_POST["Delete_Data"])) {
                        $id = $_GET['id'];
                        $product_name = $_POST['product_name'];

                        $sql2 = "DELETE FROM product_details where product_name='$product_name' ";

                        if (mysqli_query($conn, $sql2)) {
                            echo " <script type='text/javascript'>Swal.fire({icon: 'error',text: 'Data deleted successfully',}).then(function() {window.location.href = 'update-product.php';})</script>";
                        } else {
                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                        }
                    }

                    $id = $_GET['id'];
                    $sql = "SELECT * FROM product_details where id='$id'";
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
               <td>
                   <label>Product Name</label><br>
                   <input type='text' value=" . $row['product_name'] . " name='product_name' >
               </td>
           </tr>
           <td>
               <label>Company Name</label><br>
               <input type='text' value=" . $row['company_name'] . " name='company_name'  '>
           </td>
           </tr>
           <tr>
               <td>
                   <label>Expiry Date</label><br>
                   <input type='date' value=" . $row['expiry_date'] . " name='expiry_date' >
               </td>
           </tr>
           <tr>
               <td>
                   <label>Quantity</label><br>
                   <input type='text' value=" . $row['product_quantity'] . " name='product_quantity' >
               </td>
           <tr>
           <tr>
               <td>
                   <label>MRP</label><br>
                   <input type='text' value=" . $row['product_price'] . " name='product_price' >
               </td>
           <tr>

           <tr>
               <td>
               <input type='submit' value='Update' name='Add' >
               </td>
               <td>
               <input type='submit' class='btn btn-danger' value='Delete' name='Delete_Data' >
               </td>
               <td>
                   <input type='reset' name='Reset'>
               </td>
           </tr>
   		</tbody>";
                    }
                        ?>
                </table>
            </div>
            <br>
        </div>
    </form>

    <?php include 'admin-footer.html' ?>
</body>

</html>