<html> 
 <title> Edit Story</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 


<?php
session_start();
require 'database.php';
//post necessary variables and get username from session
$editedStoryTitle = strval($_POST['editedStoryTitle']);
$editedStoryText = strval($_POST['editedStoryText']);
$editedStoryLink = strval($_POST['editedStoryLink']);
$storyId = intval($_POST['storyId']);
$username = $_SESSION['usernameSession'];

//prepare mysql statement to update the story
$stmt = $mysqli->prepare("UPDATE stories SET title = '$editedStoryTitle', content = '$editedStoryText', link = '$editedStoryLink' WHERE story_id = '$storyId'");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

//execute the mysql statement
$stmt->execute();
$stmt->close();

//story has been edited, redirect to homepage
echo "Editing Story...";
header("Refresh:3; url='homepage.php'");
exit;
?>

</body>
 </html>