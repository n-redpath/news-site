<html> 
 <title>Author Profile</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 
<h1>
<?php
    session_start();
    require 'database.php'; 
    //posting the necessary variables, getting username from the session
    $author = strval($_POST['author']);
    $loggedInUser = strval($_SESSION['usernameSession']);


    //preparing the mysql statement
    $stmt = $mysqli->prepare("SELECT first_name, last_name FROM users WHERE username = '$author'");


    if(!$stmt){
	    printf("Query Prep Failed: %s\n", $mysqli->error);
	    exit;
    }
    //execute the mysql statement
    $stmt->execute();

    $result = $stmt->get_result();

    echo "User: ";
    while($row = $result->fetch_assoc()){
	    printf("\t %s %s",
		    htmlspecialchars( $row["first_name"] ),
         htmlspecialchars( $row["last_name"])
        );

}
//formatting first name and last name
$firstName = 	htmlspecialchars( $row["first_name"] );
$lastName = 	htmlspecialchars( $row["last_name"] );


?>
</h1>

<?php 
//preparing statement to list stories
$stmt2 = $mysqli->prepare("SELECT title, content, link, story_id FROM stories WHERE username = '$author'");


if(!$stmt2){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
//executing the story list
$stmt2->execute();

$result = $stmt2->get_result();

//listing the stories
while($row = $result->fetch_assoc()){
      printf("\t<li>%s %s %s</li>\n",
      htmlspecialchars( $row["title"] ), 
      htmlspecialchars( $row["content"]), 
      htmlspecialchars( $row["link"]) 
    );
    $storyId = htmlspecialchars($row['story_id']);
    $titletest = htmlspecialchars($row["title"]);
    $storyText =  htmlspecialchars( $row["content"]);
    $storyLink =     htmlspecialchars( $row["link"]);
    echo "<form action=viewStory.php method = 'POST'> 
    <input type ='hidden' name = 'storyTitle' value = '$titletest'/>
    <input type ='hidden' name = 'storyId' value = '$storyId'/>
    <input type ='hidden' name = 'storyText' value = '$storyText'/>
    <input type ='hidden' name = 'storyLink' value = '$storyLink'/>
    <input type = 'submit' value = 'view'> </form>";

}




?>



</body>
 </html>