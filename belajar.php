<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'function.php';

$belajar = query("SELECT * FROM belajar");

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
                    <a class="nav-link" href="more.php">Tambahkan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Tentang</a>
                </li>
                
            </ul>
            <form class="form-inline mt-2 mt-md-0">
            
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a class="keluar" href="logout.php">Keluar</a></button>
            </form>
        </div>
    </nav>
    
    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
        <span class="text-muted"><p>Copyright &copy; 2021 Nasheh An Nafii | Source: <a rel="nofollow" href="https://informatika.unida.gontor.ac.id">Informatika UNIDA</a></p></span>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
