<?php
include 'koneksi.php';

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
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #3289c8">
      <div class="container">
        <h3><a class="navbar-brand" href="#">USER</a></h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#galery">Galery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php"><b>ADMIN</b></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Jumbotron -->
    
    <div class="jumbotron-sm jumbotron-fluid mb-5" style="background-color: #3289c8;">
      <div class="container-sm text-dark text-center">
      
        <img class="img-thumbnail rounded-circle shadow" src="<?php echo $profil['gambar'] ?>" width="250px" height="250px" style="margin-top: 200px;">
        <h1 class="text-center mt-3"><?php echo $profil['nama'] ?></h1>
        
      </div>
      
    <!-- Icon Waves.io -->
     <svg id="about" style="margin-top: -48px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,96L48,96C96,96,192,96,288,122.7C384,149,480,203,576,218.7C672,235,768,213,864,176C960,139,1056,85,1152,74.7C1248,64,1344,96,1392,112L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
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
    <div class="container-sm" style="margin-top: px;">
      <h1 class="text-center">About</h1>
      <div class="col-sm justify-content text-center fs-5">
        <p class="col-sm mt-4"><?php echo $about['about'] ?></p>
      </div>
    </div>

    <?php } ?>
    
    

    <!-- Icon Waves.io 2 -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#3289c8"
          fill-opacity="1"
          d="M0,64L48,80C96,96,192,128,288,160C384,192,480,224,576,213.3C672,203,768,149,864,144C960,139,1056,181,1152,186.7C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>



    <!-- Gallery -->
   <section id="galery" class="pb-5">
    <h1 class="text-center mb-5">Galery</h1>
     <div class="container-sm ">
       <div class="row text-center">

       <div class="card-group justify-content-evenly">
       <?php               
            $id = mysqli_query($connect,'SELECT * FROM galery ORDER BY galery.id');
            while ($isi = mysqli_fetch_array($id)){
                $idp = $isi['id'];
        ?>
         <div class="col-md-4 mb-5">
          <div class="card shadow-sm" style="width: 98%;">
            <img src="<?php echo $isi['gambar'] ?>" style="height:230px;" class="card-img-top" alt="">
            <div class="card-body" style="height: 200px;">
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
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3289c8" fill-opacity="1" d="M0,128L80,144C160,160,320,192,480,202.7C640,213,800,203,960,192C1120,181,1280,171,1360,165.3L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
   

   <!-- Contact -->
   <div  class="container-sm">
    <h1 id="contact" class="text-center mb-5">Contact Me</h1>
    <form action="contact.php" method="POST">
      
      <input type="hidden" name="id">

      <div class="form-group mb-3">
        <label for="name">Nama</label>
        <input id="name" class="form-control" type="text" name="nama" >
      </div>
      <div class="form-group mb-3">
        <label for="email">Alamat Email</label>
        <input id="email" class="form-control" type="email" name="email">
      </div>
      <div class="form-group mb-3">
        <label for="comment">Komentar</label>
        <textarea id="comment" class="form-control" name="komentar" rows="3"></textarea>
      </div>

      <button id="btn" class="btn btn-primary" type="submit" name="simpan" style="width: 15%;">Kirim</button>
      
      <script src="js/sweetalert2.all.min.js"></script>
      <script>
        const btn = document.getElementById('btn');
        btn.addEventListener('click', function(){
          Swal.fire({
            title: 'insert!',
            text: 'Data Berhasil Ditambahkan!',
            icon: 'success'
          })
        }); 
      </script>
    </form>
   </div>

   <!-- Icon Waves.io 3 -->
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#3289c8"
          fill-opacity="1"
          d="M0,224L48,208C96,192,192,160,288,170.7C384,181,480,235,576,229.3C672,224,768,160,864,165.3C960,171,1056,245,1152,256C1248,267,1344,213,1392,186.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>

    <!-- Footer -->
   <footer class="text-center text-white pb-3" style="background-color: #3289c8">
      <p>Created with by <i class="bi bi-instagram"></i> <a href="https://www.instagram.com/arfizidan_/" target="blank" class="text-white fw-bold">Arfi Zidan</a></p>
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