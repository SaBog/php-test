<?php

$request = $_SERVER['REQUEST_URI'];
$signinpattern = "/signin.php/";
$indexpattern = "/TODOapp\/$|index.php/";

if (preg_match($signinpattern, $request))
{
  require 'signin.php';
}

if (!preg_match($indexpattern, $request))
{
header("Location: ./404.php");
}
?>
