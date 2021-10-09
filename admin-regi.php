<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/admin-regi.css">
    <title>Registration</title>
</head>
<body>
    <div class="center">
        <h1>Registration</h1><br>
        <form name="f2" action="regi-storedata.php" onsubmit="return validate()" method="post">
            <input type="text" name="fname" placeholder="Name" required>
            <input type="text" name="lname" placeholder="Surname" required><br>
            <div <?php if (isset($name_error)): ?> <?php endif ?> >
                <input type="email" name="email" placeholder="Email" required>
                <?php if (isset($name_error)): ?>
                    <span><?php echo $name_error; ?></span>
                <?php endif ?>
            </div>
            <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
            <input type="text" name="uname" placeholder="Username" required><br>
               <?php if (isset($email_error)): ?>
       	            <span><?php echo $email_error; ?></span>
               <?php endif ?>
  	       </div>
            <input type="password" name="pass" id="password" placeholder="Password" required>
            <input type="password" name="cpass" id="cpassword" placeholder="Confirm Password" required><br><br>
            <input type="submit" value="Register" style="width: 380px; height:40px; background-color: #3CBC8D; color: white;" ><br><br>
            <a href="index.html">Log In</a><br><br>
        </form>
    </div>
    <script>
        function validate(){

            var a = document.getElementById("password").value;
            var b = document.getElementById("cpassword").value;
            if (a!=b) {
               alert("Passwords do no match");
               return false;
            }
        }
     </script>
 </body>
</html>