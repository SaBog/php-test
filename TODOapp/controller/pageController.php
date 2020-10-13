<?php
if (isset($_POST['prev']))
{
  if ($_SESSION['currentPage'] > 1)
  {
    $_SESSION['currentPage']--;
  }
}

if (isset($_POST['next']))
{
  if ($_SESSION['currentPage'] < $_SESSION['maxPage'])
  {
    $_SESSION['currentPage']++;
  }
}

if (isset($_POST['check']))
{
  $_SESSION['user']->COMPLETE($_POST['check']);
}

if (isset($_POST['suggest']))
{
  $_SESSION['user']->EDIT($_POST['newtext'], $_POST['suggest']);
}

if (isset($_POST['sort']))
{
  $allowed = array("id", "username", "email", "completed");
  $key = array_search($_POST['sort'], $allowed);
  $orderby = $allowed[$key];
  $desc = false;

  if (isset($_SESSION['lastOrder']) && $_SESSION['lastOrder'] == $orderby)
  {
    $desc = !$_SESSION['lastOrderDesc'];
  }

  $_SESSION['lastOrder'] = $orderby;
  $_SESSION['lastOrderDesc'] = $desc;
  $_SESSION['user']->NEWORDER($orderby, $desc);
}

$tasks = $_SESSION['user']->SELECT($_SESSION['currentPage'] - 1);

include_once "view/tableviewer.php";

$tv = new TableView($tasks);
echo $tv->GetTable($_SESSION['user']->isAdmin());
 ?>
