<?php
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@100&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="css/body.css">

    <title>Portofolio</title>
    
  </head>
  <body>

    <?php

        $sql = "SELECT * FROM profil";
        $query = mysqli_query($connect,$sql);

        while($profil = mysqli_fetch_array($query)){    


      ?>
    
    <div id="home"></div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-3" style="background-color: #595b5c;">
      <div class="container-sm">
      <img src="https://png.pngitem.com/pimgs/s/24-248226_computer-icons-user-profile-clip-art-login-user.png" alt=""
          width="30" height="30" class="d-inline-block align-top rounded-circle">
        <a href="#home" class="nav-link  active me-4 fs-5 fw-bold" style="color: white;">PORTOFOLIO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse-sm navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link  active me-1 fw-boldder" aria-current="page" href="#home"><b>HOME</b></a>
            <a class="nav-link  active me-1 fw-boldder" href="#about">ABOUT</a>
            <a class="nav-link  active me-1 fw-boldder" href="#gallery">GALLERY</a>
            <a class="nav-link  active me-1 fw-boldder" href="#contact">CONTACT</a>
            <a class="nav-link  active me-1 fw-boldder" href="login.php"><b>ADMIN</b></a>
          </div>
        </div>
      </div>
    </nav>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="mb-5">
    <path fill="#595b5c" fill-opacity="1"
      d="M0,96L60,128C120,160,240,224,360,213.3C480,203,600,117,720,106.7C840,96,960,160,1080,181.3C1200,203,1320,181,1380,170.7L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
    </path>


    <!-- Jumbotron -->
    
    <div class="jumbotron-sm jumbotron-fluid mb-2" style="height: 500px; background-color: #fff; background-size: cover; margin-top: -120px;">
      <div class="container-sm text-dark text-center">
      
        <img class="img-thumbnail rounded-circle shadow" src="<?php echo $profil['gambar'] ?>" alt="img" width="250px" height="250px" style="margin-top: -20px;">
        <p class="lead text-center mt-2 fw-bold fs-2"><?php echo $profil['nama'] ?></p>
        
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 64 1440 620"><path fill="#595b5c" fill-opacity="1" d="M0,64L48,64C96,64,192,64,288,90.7C384,117,480,171,576,181.3C672,192,768,160,864,138.7C960,117,1056,107,1152,96C1248,85,1344,75,1392,69.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>
    <?php
        }
        ?>

  

    <?php

        $sql = "SELECT * FROM about";
        $query = mysqli_query($connect,$sql);

        while($about = mysqli_fetch_array($query)){


      ?>
    <!-- About -->
    <span id="about"></span>
    <div class="card">
      <div class="container-sm" style="margin-top: 200px; margin-bottom: 450px;">
        <h1 class="text-center fw-bold mb-5 display-5">ABOUT</h1>
        <div class="col-sm justify-content text-center fs-5">
          <p class="col-sm"><?php echo $about['about'] ?></p>
        </div>
      </div>
    </div>

    <?php } ?>
    
    
    <!-- Gallery -->
    <span id="gallery"></span>
   <section class="pb-5">
    <h1 class="text-center fw-bold mb-5 display-5 text-dark" style="padding-top: 120px; padding-bottom: 10px;">GALLERY</h1>
     <div class="container-sm ">
       <div class="row text-center">

       <div class="card-group justify-content-evenly">
       <?php               
            $id = mysqli_query($connect,'SELECT * FROM gallery ORDER BY gallery.id');
            while ($isi = mysqli_fetch_array($id)){
                $idp = $isi['id'];
        ?>
         <div class="col-md-4 mb-4">
          <div class="card shadow-sm" style="width: 98%;">
            <img src="<?php echo $isi['gambar'] ?>" style="height:250px;" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title fw-bold text-center"><?php echo $isi['judul'] ?></h5>
              <p class="card-text"><?php echo $isi['isi'] ?></p>
            </div>
          </div>
         </div>
        <?php 
            } 
        ?>
       </div>
       </div>
     </div>
   </section>


   <!-- Contact -->
   <br id="contact"><br><br><br>
   <div class="container-sm" style="padding-bottom : 130px; padding-top: 60px;">
    <h1 class="text-center mb-3"><b>CONTACT</b></h1>
    <form action="contact.php" method="POST">
      
      <input type="hidden" name="id">

      <div class="form-group mb-3 ms-5">
        <label for="name">Nama</label>
        <input id="name" class="form-control" type="text" name="nama" placeholder="Masukkan Nama Anda">
      </div>
      <div class="form-group mb-3 ms-5">
        <label for="email">Alamat Email</label>
        <input id="email" class="form-control" type="email" name="email" placeholder="name@gmail.com">
      </div>
      <div class="form-group mb-3 ms-5">
        <label for="comment">Komentar</label>
        <textarea id="comment" class="form-control" name="komentar" placeholder="Masukkan Komentar Anda" rows="3"></textarea>
      </div>

      <button class="btn btn-dark d-grid me-auto ms-5" type="submit" name="simpan" style="width: 10%;">Submit</button>

    </form>
   </div>



   <!-- Footer -->
   <footer class="footer position-relative text-center pb-3" style="background-color: #252626;">
     <div class="text-center fw-bolder text-light">
       <h6>Ariansyah © 2021</h6>
     </div>
   </footer>


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