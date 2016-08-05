<?php 

    require("common.php"); 
	
	//Empty the session variable
	//this disables a person from using the website
	//after they log off
    unset($_SESSION['user']); 
     
    //Go to the login page
    header("Location: ../main/db_index.php"); 
    die("Redirecting to: ../main/db_index.php");
	
?>