<?php

require 'function.php';

$mahasiswa = query("SELECT * FROM user");

session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: logadmin.php");
  exit;
}

if (isset($_POST["cariUser"])) {
    $mahasiswa = cariUser($_POST["keyword"]);
}
if (isset($_POST["Hapus"])) {
    if (hapus($_POST) > 0){
        echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'pengguna.php';
        </script>
        ";
    }else {
        echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'pengguna.php';
        </script>
        ";
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
                <button class="btn btn-outline-success my-2 my-sm-0" name="cariUser" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <h2 class="col-12 text-center tm-section-title"><b>Database User</b></h2>
    
  <table class="table">
  <thead class="thead-dark">

    <tr>
      <th>Id</th>
      <th>Aksi</th>
      <th>User</th>
    </tr>

  </thead>
    <?php $i = 1 ;?>
    <?php foreach ($mahasiswa as $rows) : ?>
        <tbody>
            <form action="" method="post">
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <input type="hidden" name="pengguna" value="<?= $rows["pengguna"]; ?>"> 
                        <button type="submit" name="Hapus" class="btn btn-sm btn-outline-secondary" onclick=" return confirm('Apakah user yakin akan dihapus ?');">Hapus</button>
                    </td>
                    <td><?= $rows["pengguna"]; ?></td>
                </tr>
            </form>
        </tbody>
    <?php $i++;?>
    <?php endforeach; ?>

</table> 
</body> 
</html>