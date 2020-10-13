<?php

if (isset($_POST['newrecord']))
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $task = $_POST['task'];

  $emailValide = isEmailValide($email);
  $usernameValide = isUserNameValide($username);

  if (!$emailValide)
  {
    $_SESSION['emailValide'] = "Valid email is required.";
  }

  if (!$usernameValide)
  {
    $_SESSION['usernameValide'] = "Valid username is required.";
  }

  if ($emailValide && $usernameValide)
  {
    $_SESSION['user']->INSERT("'$username', '$email', '$task'");
  }

}

function isEmailValide($email)
{
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isUserNameValide($username)
{
  $pattern = "/[a-zA-Z0-9_-]+/";
  return preg_match($pattern, $username);
}

 ?>
