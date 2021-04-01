<?php
session_start();

if(isset($_SESSION["login"])){
    header("Location: admin.php");
    exit;
}

require 'config.php';

if(isset($_POST["login"])){

    $username= $_POST["username"];
    $password= $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            // cek session
            $_SESSION["login"] = true;

            header("Location: admin.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>    
     <div class="container" id="container">      
      <div class="form-container sign-in-container">
        <form action="" method="POST">
          <h1>Sign in</h1>
          <?php if(isset($error)): ?>
            <p style="color:red;">Username atau Password salah!</p>
            <?php endif; ?>
          <input type="text" name="username" placeholder="Username" />
          <input type="password" name="password" placeholder="Password" />
          <button type="submit" name="login">Sign In</button>
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
      <p>Belum Memiliki Akun? <a href="register.php">Daftar Disini</a></p>
    </footer>
</body>
</html>