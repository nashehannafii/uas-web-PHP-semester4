<?php

session_start();
if (!isset($_SESSION["login"])) {
  header('Location: login.php');
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
    <title>Admin</title>

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
    <a class="navbar-brand" href="admin.php">Web Belajar Capel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="data.php">Database Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pengguna.php">Database User</a>
                </li>
                
            </ul>
            <form class="form-inline mt-2 mt-md-0" action="logout.php" method="">
              <input type="hidden" name="keluar" value="keluar">
              <button class="btn btn-outline-secondary active"  type="submit" name="keluar"> keluar</button>
            </form>
        </div>
    </nav>

    <header class="row tm-welcome-section">

        <h1 class="col-12 text-center tm-section-title">Admin Control</h1>
        <h2 class="col-12 text-center tm-section-title">--------------------------------</h2>
        
    </header>

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
        <span class="text-muted"><p>Copyright <a class="text-muted" href="pengguna.php">&copy;</a> 2021 Nasheh An Nafii | Source: <a rel="nofollow" href="https://informatika.unida.gontor.ac.id">Informatika UNIDA</a></p></span>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
