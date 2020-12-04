<html> 
 <title>Adding New Story</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 


<?php
require 'database.php';
session_start();
$storyTitle = strval($_POST['storyTitle']);
$storyText = strval($_POST['storyText']);
$storyLink = strval($_POST['storyLink']);
$storyId = intval($_POST['storyId']);
$author = strval($_POST['author']);
$username = $_SESSION['usernameSession'];

?>

<div class = "card">
<h1>
<?php
echo $storyTitle;
?>
</h1>
<p>
<?php
echo $storyText;
echo $storyLink;
?>
</p>
</div>

<h4>Comments</h4>
<?php



$stmt = $mysqli->prepare("SELECT content, username, comment_id FROM comments WHERE comments.story_id = $storyId");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}


$stmt->execute();

$result = $stmt->get_result();

echo "<ul>\n";

echo "<form action = 'profilePage.php' method='POST'>
    <input type = 'hidden' name = 'author' id = 'author' value = '$author'>
    <input type='submit' name='viewProfile' value='View Author Profile'>
    </form>"; 
    

while($row = $result->fetch_assoc()){
	printf("\t<li>%s %s </li>\n",
		htmlspecialchars( $row["username"] ),
        htmlspecialchars( $row["content"])
  );
$comment =  htmlspecialchars( $row["content"]);
$commentId = htmlspecialchars($row["comment_id"]);
    if ($row['username']==$username){
        echo "<form action=deleteComment.php method = 'POST'> 
        <input type = 'submit' value = 'delete'/>
        <input type = 'hidden' name = 'comment' value ='$comment'/>
        <input type = 'hidden' name = 'commentId' value = '$commentId'/>
        </form>
        <form action=editComment.php method='POST'>
        <input type = 'hidden' name = 'comment' value ='$comment'/>
        <input type = 'hidden' name = 'commentId' value = '$commentId'/>
        <input type = 'submit' value = 'edit'> </form>"; }
}

// $stmt_2 = $mysqli->prepare("SELECT username FROM stories WHERE title = '$storyTitle'");

// if(!$stmt_2){
// 	printf("Query Prep Failed: %s\n", $mysqli->error);
// 	exit;
// }
// $stmt_2->execute();

// $result = $stmt_2->get_result();
// $author = $result['username'];



if ($username != null) {
    echo "<form action = 'addComment.php' method='POST'>
    <label for='title'>Add comment</label>
    <input type='text' name='comment' id='comment'>
    <input type='submit' name='Upload' value='Add Comment'> 


    <input type ='hidden' name = 'storyId' value = $storyId> 
    <input type ='hidden' name = 'username' value = $username> 
    </form>";
}

?>
</p>






























</body>
</html> 