
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
    <title>Check Near expiry</title>
</head>

<body>
    <?php include 'admin-head.html' ?>

    <form name="add-product" method="POST" action="expiry-show-product.php" enctype="multipart/form-data">
        <div class="add_prod" style="height: 500px; width:80%;padding: 10px;">
            <div style="margin-left: 100px;margin-top: 10px;">
                <h1 style="text-align: center;">Check Near Expiry</h1>
                <table cellspacing="10px">
                    
               
                    <tr>
                        <td>
                            <label>Expiry Date</label><br>
                            <input type="date" name="expiry_date_two" required>
                        </td>
                    </tr>
                    
                   
                    <tr>
                        <td>
                           <input type="submit" name="submit" value="show_press">
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

