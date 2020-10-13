<?php
include_once "model/database.php";
include_once "model/user.php";

session_start();
include_once "recordcontroller.php";

if(!isset($_SESSION['user']))
{
  $_SESSION['user'] = createdefaultuser();
  $_SESSION['currentPage'] = 1;
  $_SESSION['maxPage'] = $_SESSION['user']->pageCount();
}

function createdefaultuser()
{
  $user = User::create();
  $user->sign();

  return $user;
}

 ?>
