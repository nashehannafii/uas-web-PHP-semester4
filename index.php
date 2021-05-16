<?php


require 'function.php';


session_start();
// if (!isset($_SESSION["login"])) {
//   header('Location: login.php');
//   exit;
// }


$belajar = query("SELECT * FROM belajar");

if (isset($_POST['view'])) {
    if (view($_POST) > 0) {
        $_POST;
    }
}


if (isset($_POST["cariJudul"])) {
  $belajar = cariJudul($_POST["keyword"]);
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

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
            
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="about.php">Web Belajar Capel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
        <div class="collapse navbar-collapse" id="navbarCollapse">
            
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Utama<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="more.php">Tambahkan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Tentang</a>
                </li>
                
            </ul>
            
            
            <form class="form-inline my-2 my-lg-0" action="" method="post">
                <input autocomplete="off" name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cariJudul">Search</button>
            </form>

            <li></li>
            
            <form class="form-inline mt-2 mt-md-0" action="logout.php" method="">
              <input type="hidden" name="keluar" value="keluar">
              <?php if (!isset($_SESSION["login"])) :?>
                <button class="btn btn-outline-secondary active"  type="submit" name="keluar"> Masuk</button>
              <?php endif; ?>
              <?php if (isset($_SESSION["login"])) :?>
                <button class="btn btn-outline-secondary active"  type="submit" name="keluar"> Keluar</button>
              <?php endif; ?>
            </form>
        </div>
    </nav>
    
    <header class="container ">
      <h2 class="col-12 text-center tm-section-title"><b>Capel Learning</b></h2>
      <p class="col-12 text-center">Website untuk berbagi file sebagai bahan ajar penunjang belajar calon pelajar pondok modern Darussalam Gontor. <br> Masuk <b><a href="login.php">sekarang</a></b> untuk mengakses materi juga input.</p>
    </header>

    <div class="album py-5 bg-light">
      <div class="container">
          <div class="row">
          <?php foreach ($belajar as $bl) : ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                  
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title><?= $bl["judul"];?></title><rect width="100%" height="100%" aria-img="img/wall1.jpg" "/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $bl["judul"]; ?> </text></svg>

                <div class="card-body">
                  <p class="card-text"><?php echo $bl["deskripsi"]; ?> </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <form class="btn-group btn-group-justified" action="" method="post">
                      <?php $idview = $bl["materi"]; ?>
                      <input type="hidden" name="fileMateri" value="<?= $idview; ?>">
                      <button class="btn btn-sm btn-outline-secondary" name="view"<?php if (!isset($_SESSION["login"])) :?> disabled <?php endif; ?> >View</button>
                      <!--<a class="btn btn-sm btn-outline-secondary disabled" tabindex="-1" aria-disabled="true" href="edit.php?judul=<?= $bl["judul"];?>">Edit</a>-->
                    </form>
                    <small class="text-muted"><?php echo $bl["kesulitan"]; ?></small>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
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
