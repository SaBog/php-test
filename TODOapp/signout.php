<?php
include_once "model/database.php";
include_once "model/user.php";

session_start();
session_destroy();

header("Location: ./index.php");
 ?>
