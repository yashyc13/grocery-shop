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
    <title>Bill desk</title>
    <style>
        #btn-create-bill{
            color: white;
            width: 300px;
            height: 30px;
            position: relative;
            left: 300px;
            text-align: center;
            background-color: blue;

        }
    </style>
</head>

<body>
    <?php include 'admin-head.html' ?>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
       <table>
       <tr>
                        <td>
                        <input type="submit" name="creat-table" value="Create Bill" id="btn-create-bill">
                        </td>
                    </tr>
       </table>
</form>

    <form name="add-product" method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <div class="add_prod" style="height: 500px; width:80%;padding: 10px;">
            <div style="margin-left: 100px;margin-top: 10px;">
                <h1 style="text-align: center;">Bill Desk</h1>
                <table cellspacing="10px">
                   
                    <tr>
                        <td>
                            <label>Product Name</label><br>
                            <input type="text" name="product_name" required>
                        </td>

               
                    <tr>
                        <td>
                            <label>Quantity</label><br>
                            <input type="number" name="product_qty" required>
                        </td>
                    <tr>
                    <tr>
                        <td>
                            <label>MRP</label><br>
                            <input type="number" name="price" required>
                        </td>
                    <tr>
                    <tr>
                        <td>
                            <input type="submit" name="done" value="Add Product">
                        </td>
                        <td>
                           <button name="show-bill"><a href="print-bill.php" target="_self">Total Purches</a></button>
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
if(isset($_POST['creat-table']))
{
   $create_table="CREATE TABLE customer_bill(
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       product_name VARCHAR(30) NOT NULL,
       product_qty VARCHAR(30) NOT NULL,
       price INT(6)
    
       )";
   $tab=mysqli_query($conn,$create_table);

}
 
if(isset($_POST['done']))
{
    
  
    $p_name=$_POST['product_name'];
    $p_qty=$_POST['product_qty'];
    $p_price=$_POST['price'];

    $sq="select * from product_details where product_name='$p_name'";
$query=mysqli_query($conn,$sq);
$res=mysqli_fetch_assoc($query);
$ans=$res['product_quantity']-$p_qty;
    $sql = "INSERT INTO customer_bill (product_name,product_qty,price) VALUES ('$p_name','$p_qty','$p_price')";
    $res=mysqli_query($conn,$sql);
      
    if($res)
    {

     
        $up_sql= "UPDATE product_details SET product_quantity=$ans WHERE product_name='$p_name'";
        mysqli_query($conn,$up_sql);
      
        // $total_one=mysqli_query($conn,'SELECT SUM(price) as value_sum FROM customer_bill');
        // $total=mysqli_fetch_assoc($total_one);
       
        
    }
}




?>