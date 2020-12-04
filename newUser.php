<?php
session_start();
require 'database.php'; 
//posting the necessary variables
$first_name = strval($_POST['firstNameInput']);
$last_name = strval($_POST['lastNameInput']);
$new_user = strval($_POST['newuser']);
$new_password = strval($_POST['newPassword']);

//hashing the password input to be stored in the database
$hash_pass = password_hash($new_password, PASSWORD_BCRYPT); #this password is now salty hashed

//preparing the mysql statement
$stmt = $mysqli->prepare("INSERT into users (first_name, last_name, username, password) values (?, ?, ?, ?)");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}


//binding the parameters and executing the statement
$stmt->bind_param('ssss', $first_name, $last_name, $new_user, $hash_pass);

$stmt->execute();
$stmt->close();

//redirect to homepage
header("Location: loginpage.html");
?>