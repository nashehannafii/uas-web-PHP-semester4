<?php

require 'function.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('user berhasil ditambah !');
            document.location.href = 'login.php';
        </script>";
    }
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
    <title>Halaman register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="css/my.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="index.css" rel="stylesheet">
    <link rel="icon" href="img/lgo.png">
    
    </head>
    <body class="text-center">
        
        <form class="form-signin" action="" method="post">
          <img class="mb-4" src="img/lgo.png" alt="" width="72" height="72">
          <h1 class="h3 mb-3 font-weight-normal">Registration</h1>

          <label for="inputEmail" class="sr-only">Username</label>
          <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
          <br>

          <label for="inputPassword" class="sr-only">Kata sandi</label>
          <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Masukkan kata sandi" required>

          <label for="inputPassword2" class="sr-only">Konfirmasi Kata sandi</label>
          <input type="password" id="inputPassword2" name="password2" class="form-control" placeholder="Konfirmasi Kata sandi" required>

          <button class="btn btn-lg btn-primary btn-block" name="register" type="submit">Register !</button>
          <p>Sudah memiliki akun ?<a href="login.php"> Login</a> sekarang</p>
          <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
        
        </form>

  </body>
</html>
