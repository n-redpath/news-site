<?php
      require 'database.php';
      session_start();

      //post necessary variables and get username from session
      $comment = strval($_POST['comment']);
      $storyId = strval($_POST['storyId']);
      $commentId = strval($_POST['commentId']);
      $username = $_SESSION['usernameSession'];

      //prepare mysql statement
      $stmt = $mysqli->prepare("DELETE FROM comments WHERE comment_id = $commentId");

      if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    
    //execute mysql statement
    $stmt->execute();
    $stmt->close();
    
    //comment has been deleted, redirect to homepage
    echo "Deleting Comment...";
    header("Refresh:3; url='homepage.php'");
    exit;
    ?>





?>