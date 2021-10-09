<?php
 include "db.php";
 if(isset($_POST['Register']))
{
    $name = $_POST['fname'];
    $surname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    
    $sql_u = "select * from admin_regi where username = '$username'";
    $sql_e = "select * from admin_regi where email = '$email'";
    $res_u = mysqli_query($conn,$sql_u);
    $res_e = mysqli_query($conn,$sql_e);
    echo "done";

    if(mysqli_num_rows($res_u) > 0 )
    {
        $name_error = "Sorry....username already taken";
    }
    else if(mysqli_num_rows($res_e) > 0){
        $email_erroe = "Sorry...email already taken";
    }
    else{
        $query = "insert into admin_regi (name,surname,username,email,password) values ('$name', '$surname', '$username', '$email', '".md5($password)."')";
        $results = mysqli_query($conn,$query);
        echo 'saved';
    }

}

 ?>