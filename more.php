<?php

require 'function.php';

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

if (isset($_POST["add"])) {

  if (add($_POST) > 0) {
      echo "<script>
          alert('Data berhasil ditambah !');
      </script>";
  }else {
    echo "<script>
        alert('Data gagal ditambah !');
    </script>";
  }
}

if (isset($_POST['keluar'])) {
  header("Location: logout.php");
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Capel Learning</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/navbar-static/">
    <link href="css/index.css" rel="stylesheet">
    <link rel="icon" href="img/lgo.png">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .col-12{
        padding-top: 20px;
      }
      .about{
          border-radius: 50px;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
            
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="index.php">Web Belajar Capel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="more.php">Tambahkan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Tentang</a>
                </li>
                
            </ul>
            <form class="form-inline mt-2 mt-md-0" action="logout.php" method="">
              <input type="hidden" name="keluar" value="keluar">
              <button class="btn btn-outline-secondary active"  type="submit" name="keluar"> keluar</button>
            </form>
        </div>
    </nav>

    <main role="main" class="flex-shrink-0">
      <div class="container">
        <h2 class="col-12 tm-section-title"><b>Tambahkan Materi</b></h2>
        <form action="" method="post" enctype="multipart/form-data">

          <label for="judul" class="sr-only">Judul Pelajaran</label>
          <input type="text" id="judul" class="form-control" placeholder="Masukkan Judul" name="judul" required autofocus>
          <p></p>

          <label for="deskripsi" class="sr-only">Deskripsi</label>
          <input type="text" id="inputPassword" class="form-control" placeholder="Masukkan Deskripsi Singkat" name="deskripsi" required>
          <p></p>

          <input type="radio" id="mudah" name="tingkat" value="Mudah">
          <label for="mudah">Mudah</label><br>
          <input type="radio" id="sedang" name="tingkat" value="Sedang">
          <label for="sedang">Sedang</label><br>
          <input type="radio" id="sulit" name="tingkat" value="Sulit">
          <label for="sulit">Sulit</label>

          <p></p>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file" required>
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
          <br>
          <button class="btn btn-lg btn-primary btn-block" type="login" name="add">Tambahkan</button>  
        </form>
      </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
        <span class="text-muted"><p>Copyright &copy; 2021 Nasheh An Nafii | Source: <a rel="nofollow" href="https://informatika.unida.gontor.ac.id">Informatika UNIDA</a></p></span>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
