<?php 
include_once('db_controler.php');
$database = new database();
if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $nama = $_POST['nama'];
    if($database->register($username,$password,$nama))
    {
      header('location:login.php');
    }
}

?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Register Form</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body class="d-flex flex-column h-100">
    <!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 style="margin-left: 32%; margin-top: 20px">Form Registrasi</h1>
    <p style="margin-left: 32%; margin-top: 30px">Silahkan Daftarkan Identitas Anda</p>
    <form method="post" action="">
    <form action="" method="post">
			<input type="text" id="nama" name="nama" placeholder="Nama" />
			<input type="text" id="username" name="username" placeholder="Username" />
			<input type="password" id="password" name="password" placeholder="Password" />		
      <button><a href="login.php" class="btn btn-success">Sign in</a></button>
		</form>
</form>
  </div>
</main>

</body>
</html>