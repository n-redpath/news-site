<?php
require 'database.php';
$username = strval($_POST['usernameInput']);
$input_password = strval($_POST['passwordInput']); //inputted password
$firstname = strval($_POST['firstNameInput']);
$lastname = strval($_POST['lastNameInput']);
session_start(); 
$isUser = false; 
// checks if user is in the database
$stmt = $mysqli->prepare("SELECT COUNT(*), password FROM users WHERE username=?");
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->bind_result($cnt, $actual_password);
$stmt->fetch();

//verifies the password with the database
if ($cnt == 1 && password_verify($input_password, $actual_password)) {
  echo($username);
  $_SESSION['usernameSession'] = $username;
  $_SESSION['first_name'] = $firstname;
  $_SESSION['last_name'] = $lastname;
  $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));


  header("Refresh:2 url='homepage.php'");
}


else {
  echo('incorrect username or password');
}


?>

