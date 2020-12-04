<html> 
 <title>Logging Out</title>
 <body class= "vibe">
 <link rel="stylesheet" href="noozStyle.css"> 

<?php
session_start();
// destroys session and directs to home page
echo "Logged Out!";
session_destroy();
header("Refresh:2; url='homepage.php'");
exit;
?>


</body>
 </html>