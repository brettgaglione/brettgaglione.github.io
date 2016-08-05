<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    //Check that the user is logged in by checking the session variable 
    if(empty($_SESSION['user'])) 
    { 
        //Go to login page if not logged in
        header("Location: db_index.php"); 
         
       //Stops the php from running if no one is logged on
        die("Redirecting to db_index.php"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
    
?> 