<?php
include "db.php";


$productname=$_POST["p_name"];
$productqty=$_POST["p_qty"];
$productprice=$_POST["p_price"];


$sq="select * from product_details where product_name='$productname'";
$query=mysqli_query($conn,$sq);
$res=mysqli_fetch_assoc($query);
$ans=$res['product_quantity']-$productqty;

// $sql="INSERT INTO userdata(F_name) VALUES ('{$first_name}')";
$sql="INSERT INTO customer_bill(product_name,product_qty,price) VALUES ('{$productname}', '{$productqty}', '{$productprice}')";

$up_sql= "UPDATE product_details SET product_quantity=$ans WHERE product_name='$productname'";
mysqli_query($conn,$up_sql);

if(mysqli_query($conn,$sql))
{
    
 

    echo 1;
}
else
{
    echo 0;
}
?>