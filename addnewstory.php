<html> 
 <title>Adding New Story</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 


<?php
session_start();
require 'database.php';
//post necessary variables, get username
$storyTitle = strval($_POST['storyTitle']);
$storyText = strval($_POST['storyText']);
$storyLink = strval($_POST['storyLink']);
$username = $_SESSION['usernameSession'];

//prepare statement
$stmt = $mysqli->prepare("INSERT into stories (title, username, link, content) values (?, ?, ?, ?)");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
//bind parameters and execute
$stmt->bind_param('ssss', $storyTitle, $username, $storyLink, $storyText);

$stmt->execute();
$stmt->close();

//story is added, redirect to homepage
echo "Adding Story...";
header("Refresh:5; url='homepage.php'");
exit;
?>

</body>
 </html>