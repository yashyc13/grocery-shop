<?php
include 'db.php';
$sq = "select * from product_details";
$result =  mysqli_query($conn, $sq);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
</head>

<body>
    <br /><br />
    <div class="container">
        <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>
        <br />
        <div class="table-responsive">
            <table id="employee_data" class="table table-bordered text-black sticky">
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
                while ($row = mysqli_fetch_array($result)) {
                    echo '  
                               <tr>  
                                    <td>' . $row["product_name"] . '</td>  
                                    <td>' . $row["company_name"] . '</td>  
                                    <td>' . $row["expiry_date"] . '</td>  
                                    <td>' . $row["product_quantity"] . '</td>  
                                    <td>' . $row["product_price"] . '</td>  
                               </tr>  
                               ';
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
<script>
$(document).ready(function() {
    $('#employee_data').DataTable();
});
</script>