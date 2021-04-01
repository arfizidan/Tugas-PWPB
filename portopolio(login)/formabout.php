<?php
include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM about WHERE id='$id'";
    $query = mysqli_query($connect,$sql);
    $about = mysqli_fetch_assoc($query);


if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- My Css -->
    <link rel="stylesheet" href="style.css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Edit</title>
  </head>
  <body style="background-color: #fff;">

  <?php

        $sql = "SELECT * FROM profil";
        $query = mysqli_query($connect,$sql);

        while($profil = mysqli_fetch_array($query)){

    ?>

  <!-- NavBar -->
  <nav class="navbar navbar-light sticky-top mb-5" style="background-color: #3289c8;">
    <div class="container text-center">
        <span class="navbar-brand h1 p-2 fw-bold text-light">
        <a class="me-5 fw-bold" style="color: white; text-decoration: none;" href="admin.php">
        <i class="bi bi-arrow-left-circle"></i>
        </a>
        </span>
    </div>
    <div class="navbar-nav ms-auto">
        <a class="fw-bold" style="color: white; text-decoration: none; margin-left: -790px; font-size:x-large;">Form Edit About</a>
    </div>
  </nav>

  
  <?php } ?>

<!-- Form Edit -->

  <div class="container">
            
    <div class="card" style="margin-top: 150px;">
        
    <form action="editabout.php" method="POST">
    <div class="card-body">

    <input type="hidden" name="id" value="<?php echo $about['id']?>">

    <div class="mb-3">
    <label for="nama_barang" class="form-label fw-bold">About :</label>
    <input type="text" class="form-control" name="about" value="<?php echo $about['about']?>">
    </div>

    <button id="btn" class="btn mt-3 mb-3 btn-outline-primary" style="width: 17%; margin-left: 900px" name="edita" value="edit">Simpan Perubahan</button>
    
    <script src="js/sweetalert2.all.min.js"></script>

    <script>
    const btn = document.getElementById('btn');
    btn.addEventListener('click', function(){
      Swal.fire({
        title: 'Update!',
        text: 'Data Berhasil Di Update!',
        icon: 'success'
      })
    }); 
  </script>
            </div>
        </form>
    </div>
</div>
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>