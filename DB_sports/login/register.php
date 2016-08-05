<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 

    $username_fail = '';
     //Make sure that the login form has been submitted, if not show the form.
    if(!empty($_POST)) 
    { 
        //Check that a username was given in the POST request
        if(empty($_POST['username'])) 
        { 
            
            die("Please enter a username."); 
            
        } 
         
        //Check that some password was given
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
       
        //Check that a valid email was provided
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        //Construct the MySQL query. This query is used to check
        //whether the username provided is not already in the database
     
        $query = "SELECT 1 FROM useraccount WHERE username = :username"; 
        
        //
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            // These two statements run the query against your database table. 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            
            die("Db error"); 
        } 
         
        //This gets the row that the database returns.
        $row = $stmt->fetch(); 
         
        //If the query returns a row, we know the username has been taken already.
        if($row) 
        { 
            die("This username is already in use"); 
        } 
         
    //Now check if the email already exists in the database
        $query = "SELECT 1 FROM useraccount WHERE email = :email"; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Db error"); 
        } 
        
        $row = $stmt->fetch(); 
        
        //If the query returns a row, we know the email has been taken already.
       if($row) 
        { 
            die("This email address is already registered"); 
        } 
         
    
    //If everything is valid, insert the form data into the database
    //as a new user
        $query = "INSERT INTO useraccount (username, password, email, phonenumber, address) 
        VALUES ( :username, :password, :email, :phonenumber, :address ) "; 

        //For security we use a hashing function,
        //and store the password's hash value in the
        //user table
        $password = hash('sha256', $_POST['password'] ); 
         
        
        //Create an array of parameters for the mysql query
        //These are the values that get inserted into the user table
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':email' => $_POST['email'],
            ':phonenumber' => $_POST['phonenumber'],
            ':address' => $_POST['address'] 
        ); 
         
        try 
        { 
            //Execute the INSERT query
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
        
        }
         
        
        // This redirects the user back to the login page after they register 
        header("Location: db_index.php"); 
        die("Redirecting to login"); 
    } 
     
?> 