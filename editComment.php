<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="noozStyle.css"> 

<title> Edit Comment</title>
</head>

<?php
    require 'database.php';
    session_start();

    //post necessary variables and get username from session
    $comment = strval($_POST['comment']);
    $storyId = intval($_POST['storyId']);
    $commentId = intval($_POST['commentId']);
    $username = $_SESSION['usernameSession'];
?>

<!-- page with text box for editing comment -->
<body class="vibe">
<h2>Edit Comment: </h2>

<div class= "center">
<form class = "center" action="updateComment.php" method="POST">
<br>

<!-- hidden variables to be used in the backend -->
<input type="hidden" name = 'storyId' value ='<?php echo $storyId; ?>'>
<input type="hidden" name = 'commentId' value ='<?php echo $commentId; ?>'>

<div class="center">
    <label for="editedComment"> comment </label>
<textarea id="editedComment" name ="editedComment" rows="20" cols="50"><?php echo $comment; ?>
    </textarea>
 <input type="submit" name="Upload" value="Save Changes">
 

 </form>
</div>
</div>


</body>
</html> 