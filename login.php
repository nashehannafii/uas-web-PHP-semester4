<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location:index.php");
}

require 'function.php';


if ( !isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE Pengguna = '$username'");

    if (mysqli_num_rows($result) === 1 ) {

      $row = mysqli_fetch_assoc($result);

      if(password_verify($password, $row["password"])){

        //set true session
        $_SESSION["login"] = true;

        header("Location: index.php");
        exit;

      }else{
        echo mysqli_error($conn);
        $error = true;
      }
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
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    <link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="css/index.css">
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

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <link href="index.css" rel="stylesheet">
    </head>
    <body class="text-center">
        
        <form class="form-signin" action="" method="post">

          <img class="mb-4" src="img/lgo.png" alt="" width="72" height="72">
          <h1 class="h3 mb-3 font-weight-normal">Masuk</h1>

          <?php if (isset($error)) : ?>
              <p style="color:red; font-style:italic;">username / password salah !</p>
          <?php endif; ?>

          <label for="inputUser" class="sr-only">username</label>
          <input type="text" id="inputEmail" class="form-control" placeholder="Masukkan username" name="username" required autofocus>
          <br>

          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Masukkan kata sandi" name="password" required>
          <!-- <div class="checkbox mb-3">
              <label for="remember">
              <input type="checkbox" value="remember-me" name="remember" id="remember"> Remember me
              </label>
          </div> -->
          <button class="btn btn-lg btn-primary btn-block" type="login">Masuk</button>
          <p></p>
          <span class="text-muted"><p>Login as<a href="logadmin.php"> admin</a></p></span>
          <p>Belum punya akun ?<a href="reg.php"> Daftar</a> sekarang</p>
          <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
        
        </form>

  </body>
</html>
