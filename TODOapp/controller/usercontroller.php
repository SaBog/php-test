<?php

 include_once "model/database.php";
 include_once "model/user.php";

 if (isset($_POST['submit']))
 {
   $username = $_POST['inputLogin'];
   $password = $_POST['inputPassword'];

   $user = new User($username, $password);
   $operationResult = $user->sign($username, $password);

   if ($operationResult)
   {
     session_start();
     $_SESSION['user'] = $user;
     header("Location: ./index.php");
   }

   $error = "Введен неверный логин или пароль.";
 }

 ?>
