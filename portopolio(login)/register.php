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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>


     <div class="container" id="container">      
      <div class="form-container sign-in-container">
        <form action="" method="POST">
          <h1>Registrasi</h1>
         
          <input type="text" name="username" id="username" placeholder="Username" required/>
          <input type="password" name="password" id="password" placeholder="Password" required/>
          <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" required/>
          <a href="login.php"><button type="submit" name="register">registrasi</button></a>
          <!-- <button type="submit" name="register"><a href="login.php" style="color:#fff;">halaman login</a></button> -->
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-right">
            <img src="img/starbhak.png" width="90%" />
          </div>
        </div>
      </div>
    </div>

    <footer>
     <a href="login.php"><p>Kembali Ke Halaman LOGIN</p></a>
    </footer>

</body>
</html>