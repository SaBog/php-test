<?php
  include_once "./controller/usercontroller.php";
 ?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Авторизация</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="signStyle.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="post">

      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
      </div>

      <div class="form-label-group">
        <input type="login" name="inputLogin" class="form-control" placeholder="login" required autofocus>
        <label for="inputEmail">Логин</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Пароль</label>
      </div>

      <div class="text-center mb-4">
        <p class="mb-1 font-weight-normal"><?php echo $error ?></p>
      </div>

      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Войти</button>
    </form>
  </body>
</html>
