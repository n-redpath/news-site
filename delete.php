<html> 
 <title>Adding New Story</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 


<?php
session_start();
require 'database.php';
//post necessary variables
$storyTitle = strval($_POST['storyTitle']);
$storyText = strval($_POST['storyText']);
$storyLink = strval($_POST['storyLink']);
$storyId = intval($_POST['storyId']);
$username = $_SESSION['usernameSession'];

//prepare mysql statement
$stmt = $mysqli->prepare("DELETE FROM stories WHERE story_id = $storyId");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

//execute statement
$stmt->execute();
$stmt->close();

//story has been deleted, redirect to homepage
echo "Deleting Story...";
header("Refresh:3; url='homepage.php'");
exit;
?>
 
</body>
 </html>