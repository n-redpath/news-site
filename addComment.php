<?php
require 'database.php';
session_start();
//post necessary variables
$comment = strval($_POST['comment']);
$storyId = intval($_POST['storyId']);
$username = $_SESSION['usernameSession'];

//prepare to insert into database
$stmt = $mysqli->prepare("INSERT INTO comments (content, username, story_id) values ('$comment', '$username', '$storyId')");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
//exectute statement
$stmt->execute();
$stmt->close();

//comment is added, redirect to homepage
echo "Adding comment...";
header("Refresh:3; url='homepage.php'");
exit;



?>