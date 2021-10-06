<!DOCTYPE html>
<html lang="en">
<?php include 'session_check.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Total amount</title>
    <style>
    #con {
        width: auto;
        height: 600px;

        overflow: scroll;
    }

    .sticky thead tr th {
        position: sticky;
        top: 0;
        background: white;
        color: black;

    }
    #col-data-one{
        width: auto;
        height: 40px;

        }
    #col-data-one>button{
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
    <div class="container" id="con">
    <h1 class="text-white text-center">Total Amount</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div id="col-data-one">
            <button id="mybtn1" name="bill-paid">Bill Paid</button>
            <button id="mybtn2">Print Bill</button>
        </div>
        </form>
        <div class="col-lg-12">
       

            <table class="table table-bordered text-white sticky">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">MRP</th>
                        
                    </tr>
                </thead>
                <!-- Php Code Here -->
                <?php

                include 'db.php';
                $sq = "select * from customer_bill";
                $query = mysqli_query($conn, $sq);
                while ($res = mysqli_fetch_array($query)) {

                ?>


                <tr>
                    <td><?php echo $res['product_name'] ?></td>
                    <td><?php echo $res['product_qty'] ?></td>
                    <td><?php echo $res['price'] ?></td>
              

                </tr>
                <?php
                }
                ?>

            </table>
        </div>
    </div>


    <?php include 'admin-footer.html' ?>

</body>

</html>

<?php

include('db.php');
if(isset($_POST['bill-paid']))
{
  $drop_tab="DROP TABLE customer_bill";
  mysqli_query($conn,$drop_tab);

}
?>