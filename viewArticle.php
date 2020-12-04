<?php
require 'database.php';
session_start();
$storyTitle = $_POST['storyTitle'];
$storyText = $_POST['storyText'];
$storyLink = $_POST['storyLink'];
$storyId = $_POST['storyId'];
$username = $_SESSION['usernameSession'];







?>