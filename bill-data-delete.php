<?php
include "db.php";


$pqty=$_POST["p_qty"];
$pname=$_POST["pro_name"];
$stud=$_POST["id"];
$sql="delete from customer_bill where id={$stud}";

// qery for updateing cancel items on previous 
$sq="select * from product_details where product_name='$pname'";
$query=mysqli_query($conn,$sq);
$res=mysqli_fetch_assoc($query);
// addition for makeing a product quantiy for their previous state
$ans=$res['product_quantity']+$pqty;

    
$up_sql= "UPDATE product_details SET product_quantity=$ans WHERE product_name='$pname'";
mysqli_query($conn,$up_sql);

if(mysqli_query($conn,$sql)){
    echo 1;
}
else
{
    echo 0;
}

?>