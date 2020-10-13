<?php
  include_once "controller/mainpagecontroller.php";
  include_once "router/router.php";
 ?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Главная страница</title>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-1 shadow">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <?php
            if (isset($_SESSION['user']))
            {
              if ($_SESSION['user']->isAdmin())
              {
                echo "<a class='nav-link' href='signout.php'>Выйти</a>";
              }
              else {
                echo "<a class='nav-link' href='signin.php'>Войти</a>";
              }
            }
           ?>

        </li>
      </ul>
    </nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-5 col-lg-4 d-md-block bg-light sidebar collapse">
      <form class="needs-validation" novalidate method="post">

        <div class="col-md-11 mb-3">
          <label for="username">Имя пользователя</label>
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <?php
            if (isset($_SESSION['usernameValide']))
            {
              echo $_SESSION['usernameValide'];
              unset($_SESSION['usernameValide']);
            }?>
        </div>

        <div class="col-md-11 mb-3">
          <label for="email">e-mail</label>
          <input type="email" class="form-control" name="email" placeholder="you@example.com">
          <?php
          if (isset($_SESSION['emailValide']))
          {
            echo $_SESSION['emailValide'];
            unset($_SESSION['emailValide']);
          }?>
        </div>

        <div class="col-md-11 mb-3">
          <label for="task">Текст задачи</label>
          <textarea class="form-control" name="task" rows="3"></textarea>
        </div>

        <div class="col-md-11">
          <button class="btn btn-primary btn-lg btn-block" name="newrecord" type="submit">Добавить</button>
        </div>
      </form>
    </nav>

    <main role="main" class="col-md-7 ml-sm-auto col-lg-8 px-md-4">
      <h2 class="pt-3 pb-2">TODO List</h2>

      <div class="table-responsive border-bottom mb-3">
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <form method="post">
                <?php
                  include_once "controller/tableController.php";
                ?>
              </form>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once 'controller\pageController.php';
             ?>
          </tbody>
        </table>
      </div>

      <form class="form-row" method="post">
        <button id="submit" name="prev" value="register" class="btn btn-primary"><</button>
        <div>
          <h5 class="p-2"><?php echo $_SESSION['currentPage'] . " / " . $_SESSION['maxPage']  ?></h5>
        </div>
        <button id="cancel" name="next" value="cancel" class="btn btn-primary">></button>
      <form>

      </main>
    </div>
  </div>
<script>
  $(document).ready(function(){
    $("textarea").change(function(){
      var textID = $(event.target).attr('value');
      var txt = $(event.target).val();
      $.post("index.php", {suggest: textID, newtext : txt});
    });
  });
</script>
</body>
</html>
