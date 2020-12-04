<html> 
 <title>Home Page</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 
<div>
 <div> <h1>jonews</h1> </div>



<div class="topright">
<form name="form1" method="post" action="loginpage.html">
    <input name="login" type="submit" id="login" value="log in or sign up!">
<?php

//post the necessary variables and get the username from session
session_start();
$username = $_SESSION['usernameSession'];
$firstname =  $_SESSION['first_name'];
$lastname = $_SESSION['last_name'];

//make sure the user is logged in
  if ($username == null) {
    echo ("you are not logged in");
  }
  else {
    echo("you are logged in as $username");
  }

  ?>

</form>
<form name="form2" method="post" action="logout.php">
  <input name="logout" type="submit" id="logout" value="log out">
</form>
</div>
<!-- Add a new story button  -->
<div class="topleft">
<form name="form3" method="post" action="newstory.html">
  <input name="newstory" type="submit" id="newstory" value="Add a new story">
</form>
</div>



<!-- a blurb -->
<div class= "center">
  <div class = "card">
<form action="search.php" method = "POST">
<input type="text" name = "search" id = "search" placeholder ="search stories">
<input type="submit" id="submit" value = "submit">
</div>
</form>

<h2>Todays News:</h2>
</div>

<div align = "center">
 <?php

require 'database.php';
//preparing the mysql statement
$stmt = $mysqli->prepare("select username, title, content, link, story_id from stories order by story_id");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

//executing the mysql statement
$stmt->execute();

$result = $stmt->get_result();

//listing the stories on the homepage
echo "<ul>\n";
while($row = $result->fetch_assoc()){
	printf("\t%s %s <br /> %s %s <br /> %s %s <br /> %s %s <br/>",
		"AUTHOR: ", htmlspecialchars( $row["username"] ),
    "TITLE: ", htmlspecialchars( $row["title"] ), 
    "STORY: ", htmlspecialchars( $row["content"]), 
    "LINK: ", htmlspecialchars( $row["link"])
    
  );
  $storyId = htmlspecialchars($row['story_id']);
  $titletest = htmlspecialchars($row["title"]);
  $storyText =  htmlspecialchars( $row["content"]);
  $storyLink =     htmlspecialchars( $row["link"]);
  $author = htmlspecialchars( $row["username"]);
  echo "<form action=viewStory.php method = 'POST'> 
  <input type ='hidden' name = 'storyTitle' value = '$titletest'/>
  <input type ='hidden' name = 'storyId' value = '$storyId'/>
  <input type ='hidden' name = 'storyText' value = '$storyText'/>
  <input type ='hidden' name = 'storyLink' value = '$storyLink'/>
  <input type ='hidden' name = 'author' value = '$author'/>
  <input type = 'submit' value = 'view'> </form>";
    if ($row['username']==$username){
    echo "<form action=deleteStory.php method = 'POST'> 
          <input  type = 'hidden' name = 'storyTitle' value ='$titletest'/>
          <input type ='hidden' name = 'storyId' value = '$storyId'/>
          <input type ='hidden' name = 'storyText' value = '$storyText'/>
          <input type ='hidden' name = 'storyLink' value = '$storyLink'/>
          <input type = 'submit' value = 'delete'/>
          </form>";
    echo "<form action=editStory.php method = 'POST'> 
          <input type ='hidden' name = 'storyTitle' value = '$titletest'/>
          <input type ='hidden' name = 'storyId' value = '$storyId'/>
          <input type ='hidden' name = 'storyText' value = '$storyText'/>
          <input type ='hidden' name = 'storyLink' value = '$storyLink'/>
          <input type = 'submit' value = 'edit'> </form>";

  }

}




?>
</div>


 
 </body>
 </html>