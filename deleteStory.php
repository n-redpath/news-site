<html> 
 <title>Adding New Story</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 


<?php
require 'database.php';
session_start();

//post required variables and get username from session
$storyTitle = strval($_POST['storyTitle']);
$storyText = strval($_POST['storyText']);
$storyLink = strval($_POST['storyLink']);
$storyId = intval($_POST['storyId']);
$username = $_SESSION['usernameSession'];

//prepare two statements -> one to delete all comments, and one to delete the story afterwards
$stmt = $mysqli->prepare("DELETE FROM stories WHERE story_id = $storyId");
$stmt_2 = $mysqli->prepare("DELETE FROM comments WHERE story_id = $storyId");



if(!$stmt_2){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

//execute deletion of comments
$stmt_2->execute();
$stmt_2->close();


if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

//execute deletion of story
$stmt->execute();
$stmt->close();



//story has been deleted, redirect to homepage
echo "Deleting Story...";
header("Refresh:3; url='homepage.php'");
exit;
?>
 
</body>
 </html>