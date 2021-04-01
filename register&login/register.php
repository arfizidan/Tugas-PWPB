<?php
require 'config.php';


if (isset($_POST["register"]) ) {

    if (registrasi($_POST) > 0 ){
        echo "<script>
        alert('user baru telah  berhasil di tambahkan');
        </script>";
    } else{
        echo mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
    label{
        display:block;
    }
    </style>
</head>
<body>
    <h1 style="margin-left:30px;">REGISTER</h1>
    <form action="" method="post">
    <ul>
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>   
        <li>
            <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>   
        <li>
            <label for="password2">konfirmasi password :</label>
            <input type="password" name="password2" id="password2">
        </li>   
        <li><br>
            <button type="submit" name="register" style="color:#00BD1F">registrasi</button>
           <button type="submit" name="register"><a href="login.php" style="text-decoration:none;color:blue;">halaman login</a></button>
        </li>
    </ul>
    
    </form>
</body>
</html>