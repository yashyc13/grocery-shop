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
    <title>show product</title>
    <style>
    #con {
        width: auto;
        height: 550px;
        overflow: scroll;
    }

    .sticky thead tr th {
        position: sticky;
        top: 0;
        background: white;
        color: black;

    }
    </style>
</head>

<body>
    <?php include 'admin-head.html' ?>
    <div class="container" id="con">
        <div class="col-lg-12">
            <h1 class="text-white text-center">Shortage Iteams</h1>

            <table class="table table-bordered text-white sticky">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Company Name</th>
                        <th>Expiry Date</th>
                        <th>Product Qty</th>
                        <th>Product Price</th>

                    </tr>
                </thead>
                <?php

                include 'db.php';
                $sq = "select * from product_details where product_quantity<5 ";
                $query = mysqli_query($conn, $sq);
                while ($res = mysqli_fetch_array($query)) {
                ?>

                <tr>
                    <td><?php echo $res['product_name'] ?></td>
                    <td><?php echo $res['company_name'] ?></td>
                    <td><?php echo $res['expiry_date'] ?></td>
                    <td><?php echo $res['product_quantity'] ?></td>
                    <td><?php echo $res['product_price'] ?></td>

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