<?php
include 'koneksi.php';

?>

<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'config.php'

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
    <link rel="stylesheet" href="css/style.css">

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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top p-2" style="background-color: #595b5c;">
      <div class="container-sm">
      <img src="https://png.pngitem.com/pimgs/s/24-248226_computer-icons-user-profile-clip-art-login-user.png" alt=""
          width="30" height="30" class="d-inline-block align-top rounded-circle">
        <a href="#home" target="blank" class="nav-link  active me-4 fs-5 fw-bold" style="color: white;">PORTOFOLIO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse-sm navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link  active me-1 fw-boldder" style="color: white;" aria-current="page" href="#home"><b>HOME</b></a>
            <a class="nav-link  active me-1 fw-boldder" style="color: white;" href="#about">ABOUT</a>
            <a class="nav-link  active me-1 fw-boldder" style="color: white;" href="#gallery">GALLERY</a>
            <a class="nav-link  active me-1 fw-boldder" style="color: white;" href="#contact">CONTACT</a>
            <a class="nav-link  active me-1 fw-boldder" style="color: white;" href="logout.php"><b>LOGOUT</b></a>
          </div>
        </div>
      </div>
    </nav>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="mb-5">
    <path fill="#595b5c" fill-opacity="1"
      d="M0,96L60,128C120,160,240,224,360,213.3C480,203,600,117,720,106.7C840,96,960,160,1080,181.3C1200,203,1320,181,1380,170.7L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
    </path>

    <!-- Jumbotron -->
    <div class="jumbotron-sm jumbotron-fluid mb-5" style="height: 600px; background-color: #fff; background-size: cover; margin-top: -200px;">
      <div class="container-sm text-dark text-center">
      
        <img class="img-thumbnail rounded-circle shadow" src="<?php echo $profil['gambar'] ?>" alt="img" width="250px" height="250px" style="margin-top: 48px;">
        <p class="lead text-center mt-2 fw-bold fs-2"><?php echo $profil['nama'] ?></p>

       <?php
        echo "<a class='btn btn-success me-1' name='edita' href='formprofil.php?id=".$profil['id']."'>Edit Profil</a> ";
       ?>

        
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
          <?php
          echo "<a class='btn btn-success me-1' name='edita' href='formabout.php?id=".$about['id']."'>Edit About</a> ";

          ?>
        </div>
      </div>
    </div>

    <?php } ?>
    
    
    <!-- Gallery -->
    <span id="gallery"></span>
   <section class="pb-5">
    <h2 class="text-center fw-bold mb-5 display-5 text-dark" style="padding-top: 100px">GALLERY</h2>
     <div class="container-sm ">
       <button class="btn btn-success text-center" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 15%;">Tambah Gallery</button>

       <div class="card mt-2">
           <div class="card-body" style="overflow-y: scroll; height :500px;">
           <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Isi</th>
            <th scope="col">Gambar</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php
              
            $sql = "SELECT * FROM gallery";
            $query = mysqli_query($connect,$sql);
            $no_urut = 0;

            while($gallery = mysqli_fetch_array($query)){
              $no_urut++;
              
                echo "<tr>";

                echo "<td>".$no_urut."</td>";
                echo "<td>".$gallery['judul']."</td>";
                echo "<td>".$gallery['isi']."</td>";
                echo "<td><img src='".$gallery['gambar']."'style='width:100px; height:100px;'></td>";

                echo "<td>";
                echo "<a class='btn btn-warning me-1' onclick='add()'' name='simpan' href='formgallery.php?id=".$gallery['id']."'>Edit</a> ";
                echo "<a class='btn btn-danger ms-1' href='galleryhapus.php?id=".$gallery['id']."'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
      </table>
           </div>
       </div>
     </div>
   </section>


<!-- Modal Input Gallery -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header text-dark" style="background-color: #BDC3C7;">
            <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Gallery</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="gallery.php" method="POST">

            <input type="hidden" name="id">
                
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <input type="text" class="form-control" id="isi" name="isi" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar" aria-describedby="emailHelp">
            </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" name="simpan">Tambahkan</button>
            </div>
        </form>
        </div>
    </div>
    </div>


   <!-- Contact -->
   <br id="contact"><br><br><br>
   <div class="container-fluid" style="padding-bottom: 70px; padding-top: 80px;">
   <div class="card" style="background-color: #C7D6D6;">
       <h1 class="card-title mt-3 text-dark text-center fw-bold">CONTACTS</h1>
       <div class="card-body" style="height: 400px; overflow-y: scroll;">

       <?php               
            $id = mysqli_query($connect,'SELECT * FROM contact ORDER BY contact.id');
            while ($con = mysqli_fetch_array($id)){
                $idp = $con['id'];
        ?>

       <div class="container-fluid">
        <div class="card shadow mb-3 mt-3">
            <div class="card-body">
                <p class="card-title">
                    <b class="fs-5"><?php echo $con['nama'] ?></b> <br>
                    <small class="secondary"><?php echo $con['email'] ?></small><br>
                    <hr style="width: 300px;">
                </p>
                <p class="card-text">"<?php echo $con['komentar'] ?>"</p>
            </div>
         </div>
        </div>
       

       <?php 
        } 
        ?>
    </div>
   </div>
   </div>



   <!-- Footer -->
   <footer class="footer position-relative text-center pb-3" style="background-color: #252626">
     <div class="text-center fw-bolder text-white">
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