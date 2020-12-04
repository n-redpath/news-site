<html> 
 <title> Edit Comment</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 


<?php
session_start();
require 'database.php';
$editedComment = strval($_POST['editedComment']);
$commentId = intval($_POST['commentId']);
$username = $_SESSION['usernameSession'];

$stmt = $mysqli->prepare("UPDATE comments SET content = '$editedComment' WHERE comment_id = $commentId");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->execute();
$stmt->close();


echo "Editing Comment...";
header("Refresh:3; url='homepage.php'");
exit;
?>
</body>
 </html>