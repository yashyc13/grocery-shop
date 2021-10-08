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
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Bill desk</title>
    <style>

        /* code for only styling the element in the web page */
        #table-delete{
            color: white;
            width: 90px;
            height: 25px;
        
        
            background-color: blue;

        }
        #main-div{
  width: 90%;
  height: 520px;
  position: relative;
  display: flex;
  flex-direction: row-reverse;
  flex-wrap: wrap;
  justify-content: space-around;

  
  background-color: white;

}
#main-div .one{
  width: 450px;
  height: 87%;
 
  border: 2px solid silver;
}
#main-div .one .heading-div{
  width: auto;
  height: 40px;

  position: relative;

}
#main-div .one .entry-product form label{
    color: black;

}
#main-div .one .entry-product{
  width: auto;
  height: 400px;
  position: relative;
color: white;
  top: 4px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  line-height: 30px;
}
#main-div .one .table-div{
  width: auto;
  height: 430px;
  position: relative;
  
  top: 4px;
  overflow: scroll;
}
#main-div .one .btn-option-div{
  width: auto;
  height: 40px;
  position: relative;

  top: 6px;
  display: flex;
  justify-content: space-around;
  align-items: center;

}

.entry-product .product-text-field{
  width: 400px;
  height: 40px;

  position: relative;
  
}
.sticky tr th{
            position: sticky;
            top: 0;
            background: white;
            color: black;

        }
    </style>
</head>

<body>
    <?php include 'admin-head.html' ?>
    <div class="container">
        <!-- heading of the bill desk -->
    <h4 class="text-center text-white">Bill Desk</h4>
    <div id="main-div">
   
        <!-- For bill product -->
        <div class="one">
            <div class="heading-div">
                 <h3 class="text-black text-center">Billing Recipet</h3>
            </div>
            <div class="table-div">
                <div id="table-id-show">
            <!-- here are the table will be printed which is fecth by the ajax bill load file -->
                </div>
               
            </div>
            <div class="btn-option-div">
                <!-- buttons for the various operation  -->
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <button class="btn btn-primary" id="load-data">Bill Print</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-primary">Online Payment</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-primary" name="bill-paid">Bill Paid</button>
                </form>
            </div>
        </div>
        <!-- for enter product -->
        <div class="one">
            
            <div class="heading-div">
                <h3 class="text-black text-center">Entry Product</h3>
            </div>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <button class="btn btn-primary" name="creat-table">Make Bill</button> <br>
            </form>
            <div class="entry-product">
           
                          <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                         
                 
                            <label>Product Name</label><br>
                            <input class="product-text-field" id="product_name" type="text" name="product_name" required><br>
                   
                            <label>Quantity</label><br>
                            <input class="product-text-field" id="product_qty" type="number" name="product_qty" required><br>
             
                            <label>MRP</label><br>
                            <input class="product-text-field" id="price" type="number" name="price" required><br>
               
                            <input type="submit" name="done" id="save-btn" value="Add Product"><br>
                        
                          </form>
            </div>
           
        </div>
    </div>

    </div>


      <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    -->
    <script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

// ajax for the loding the data from the data base in the specified id tag 

$(document).ready(function(){

function loadtable(){
    $.ajax({
   url:"bill-load.php",
   type:"POST",
   success:function(data){
       $("#table-id-show").html(data);
   }
    });
}
loadtable();


// code for inserting data in the database
$("#save-btn").on("click",function(e){
    
e.preventDefault();



var product_name=$("#product_name").val();
var product_qty=$("#product_qty").val();
var price=$("#price").val();

$.ajax({
 url:"insert-bill-data.php",
 type:"POST",
//  send the value to the database that you want to store in the database
 data:{p_name:product_name,p_qty:product_qty,p_price:price},
 success:function(data){
     if(data == 1)
     {

         loadtable();

     }
     else
     {
         alert("cant save record");
     }
 }
})

});
});

// data will be deleted when excuting below code


$(document).on("click",".delete-btn",function(){
        var studentId=$(this).data("id");
 
        // this variable for use to update query for their value
        var product_name=$("#product_name").val();
        var product_qty=$("#product_qty").val();
      
        var element= this;
        $.ajax({
            url:"bill-data-delete.php",
            type:"POST",
            // it must you to pass the value of the variable
            data:{id:studentId,p_qty:product_qty,pro_name:product_name},
          success:function(data){
          if(data == 1)
          {
              $(element).closest("tr").fadeOut();
                    
          }
       
          }

    });
});
</script>
</body>
</html>


<?php
include('db.php');

// code for creating a table for makeing a bill after clicking on make bill button
if(isset($_POST['creat-table']))
{
   $create_table="CREATE TABLE customer_bill(
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       product_name VARCHAR(30) NOT NULL,
       product_qty VARCHAR(30) NOT NULL,
       price INT(6)
    
       )";
   $tab=mysqli_query($conn,$create_table);
   if($tab)
   {
    echo " <script type='text/javascript'>Swal.fire({icon: 'success',text: 'Bill created successfully',}).then(function() {window.location.href = 'sold-and-update.php';})</script>";
   }
   else
   {
    echo " <script type='text/javascript'>Swal.fire({icon: 'error',text: 'alredy bill  created',}).then(function() {window.location.href = 'sold-and-update.php';})</script>";

   }

}



// code for droping a table after bill is done 

if(isset($_POST['bill-paid']))
{
  $drop_tab="DROP TABLE customer_bill";
  if(mysqli_query($conn,$drop_tab))
  {
    echo " <script type='text/javascript'>Swal.fire({icon: 'success',text: 'Bill-cancel successfully',}).then(function() {window.location.href = 'admin-home.php';})</script>";
  }
  else
  {
    echo " <script type='text/javascript'>Swal.fire({icon: 'error',text: 'You have not created bill ',}).then(function() {window.location.href = 'sold-and-update.php';})</script>";
  }
}
?>