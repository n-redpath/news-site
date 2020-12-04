<html> 
 <title>Home Page</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 

<?php

require 'database.php';
session_start();
$searchText = strval($_POST['search']);
$username = $_SESSION['usernameSession'];

$stmt = $mysqli->prepare("SELECT * FROM stories where title = '$searchText'");


if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();
$result = $stmt->get_result();

// if ($result->fetch_assoc == null) {//if there are no stories with the inputted title
//     echo "No results, try another title";
// }

echo "<ul>\n";
while($row = $result->fetch_assoc()){
	printf("\t<li>%s %s %s </li>\n",
		htmlspecialchars( $row["title"] ),
        htmlspecialchars( $row["content"]),
        htmlspecialchars($row['link'])
  );
}





?>
 
 </body>
 </html>