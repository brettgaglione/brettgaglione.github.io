<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // This variable will be used to re-display the user's username to them in the 
    // login form if they fail to enter the correct password.  It is initialized here 
    // to an empty value, which will be shown if the user has not submitted the form. 
    $submitted_username = ''; 
    $login_fail = '';
 
    //Make sure that the login form has been submitted, if not show the form.
    if(!empty($_POST)) 
    { 
  
  
    //set up the query to run
        $query = "SELECT id, username, password, email, phonenumber, address FROM useraccount WHERE username = :username"; 
       
        
        // The parameter values 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            // Execute the query with the parameters specified 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Db error");
        } 
         
        
        //Boolean which checks whether the username and password are correct
        $login_ok = false; 
         
        
        //Get the results from the database query as a single row
        $row = $stmt->fetch(); 
        if($row) 
        { 
           
           //We check whether the password entered was correct or not by hashing it and comparing
           //the hash with the database's response
            $check_password = hash('sha256', $_POST['password']); 
            
            
            if($check_password === $row['password']) 
            { 
               //Allow the login to continue if they entered a valid
               //username and password
                $login_ok = true; 
                
            //take out sensitve information from $_SESSION for security
            unset($row['password']); 
             
            //Store the username in session data so we can call on it later.
            $_SESSION['user'] = $row; 
             
             
            // Redirect the user to the private members-only page. 
            header("Location: db_main.php"); 
            die("Redirecting to: db_main.php"); 
                
            }
            else 
        { 
            // Tell the user they failed 
            //print("Login Failed."); 
            $login_fail = "**Login Failed**";
            //This variable is automatically displayed in the username field
            //in case the user submits a wrong password. This allows them to 
            //only have to retype their password when they retry logging in.
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        }  
      } 
        
    } 
     
?> 