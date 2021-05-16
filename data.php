<?php

require 'function.php';

$materi = query("SELECT * FROM belajar");

session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: logadmin.php");
  exit;
}

if (isset($_POST["cariJudul"])) {
    $materi = cariJudul($_POST["keyword"]);
}

if (isset($_POST["Hapus"])) {
    if (hapusisi($_POST) > 0){
        echo "
        <script>
            alert('materi berhasil dihapus!');
            document.location.href = 'data.php';
        </script>
        ";
    }else {
        echo "
        <script>
            alert('materi gagal dihapus!');
            document.location.href = 'data.php';
        </script>
        ";
    }
}

if (isset($_POST['view'])) {
    if (view($_POST) > 0) {
        $_POST;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="icon" href="img/lgo.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
                
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="post">
                <input autocomplete="off" name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cariJudul">Search</button>
            </form>
        </div>
    </nav>

    <h2 class="col-12 text-center tm-section-title"><b>Database Materi</b></h2>
    
  <table class="table">
  <thead class="thead-dark">

    <tr>
      <th>Id</th>
      <th>Aksi</th>
      <th>Judul</th>
      <th>Deskripsi</th>
      <th>Data</th>
      <th>Tingkat</th>
    </tr>

  </thead>
    <?php $i = 1 ;?>
    <?php foreach ($materi as $mtr) : ?>
        <tbody>
            <form action="" method="post">
                <tr>
                    
                    <td><?= $i; ?></td>
                    <td>
                        
                        <input type="hidden" name="judul" value="<?= $mtr["judul"]; ?>"> 
                            <button type="submit" name="Hapus" class="btn btn-sm btn-outline-secondary" onclick=" return confirm('Apakah materi yakin akan dihapus ?');">Hapus</button>
                        <a class="btn btn-sm btn-outline-secondary" href="ubahisi.php?judul=<?= $mtr["judul"];?>">Ubah</a>
                        <!--<a class="btn btn-outline-secondary" href="hapus.php?judul=<?= $mtr["judul"];?>">Hapus</a>-->
                        
                    </td>
                    <td><?= $mtr["judul"]; ?></td>
                    <td><?= $mtr["deskripsi"]; ?></td>
                    <td>
                        <form class="btn-group btn-group-justified" action="" method="post">
                          <?php $idview = $mtr["materi"]; ?>
                          <input type="hidden" name="fileMateri" value="<?= $idview; ?>">
                          <button class="btn btn-sm btn-outline-secondary" name="view" >View</button>
                        </form>
                        <?= $mtr["materi"]; ?>
                    </td>
                    <td><?= $mtr["kesulitan"]; ?></td>
                    
                </tr>
            </form>
        </tbody>
    <?php $i++;?>
    <?php endforeach; ?>

</table> 
</body> 
</html>