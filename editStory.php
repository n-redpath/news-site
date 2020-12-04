<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="noozStyle.css"> 

<title> Edit Story</title>
</head>

<?php
    require 'database.php';
    session_start();
    //post necessary variables, get username from session
    $storyTitle = strval($_POST['storyTitle']);
    $storyText = strval($_POST['storyText']);
    $storyLink = strval($_POST['storyLink']);
    $storyId = intval($_POST['storyId']);
    $username = $_SESSION['usernameSession'];
?>

<body class="vibe">
<h2>Edit Story: </h2>

<div class= "center">
<form class = "center" action="editFile.php" method="POST">
<!-- text box for title -->
    <label for="title">Edit Story Title </label>
<textarea type="text" name="editedStoryTitle" id="editedTitle"><?php echo $storyTitle; ?></textarea>
<br>

<input type="hidden" name = 'storyId' value ='<?php echo $storyId; ?>'>

<!-- text box for adding text to story -->
<div class="center">
    <label for="newText">  story text </label>
<textarea id="newText" name = "editedStoryText" rows="20" cols="50"><?php echo $storyText; ?>
    </textarea>
    <div class="center">
        <label for="newLink" placeholder="Edit Link"></label>
        <Textarea type="url" id="newLink" name = "editedStoryLink"><?php echo $storyLink; ?></textarea>
    </div>
 <input type="submit" name="Upload" value="Save Changes">
 

 </form>
</div>
</div>


</body>
</html> 