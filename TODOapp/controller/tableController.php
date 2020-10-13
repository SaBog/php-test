<?php
include_once "model/database.php";
include_once "model/user.php";
include_once "view/table.php";

if ($_SESSION['user']->isAdmin())
{
  echo GetAdminHeadTable();
}
else
{
  echo GetDefaultHeadTable();
}

?>
