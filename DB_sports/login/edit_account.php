<?php 

    require("common.php"); 
     
    //Check that a user is currently logged on
    if(empty($_SESSION['user'])) 
    { 
        //Go to login page if not 
        header("Location: db_index.php"); 
         
       
        die("Redirecting to db_index.php"); 
    } 
     
   
    //Show the form if no form has been submitted yet
    if(!empty($_POST)) 
    { 
        //Check that a valid email was provided
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid email address"); 
        } 
         
       
        //check if the email value has been changed 
        if($_POST['email'] != $_SESSION['user']['email']) 
        { 
            //Create the string for the MySQL query
            $query = "SELECT 1 FROM useraccount WHERE email = :email"; 
             
            //Create an array for the parameters of the query
            $query_params = array( 
                ':email' => $_POST['email'] 
            ); 
             
            try 
            { 
                // Execute the query with the arguments provided
                $stmt = $db->prepare($query); 
                $result = $stmt->execute($query_params); 
            } 
            catch(PDOException $ex) 
            { 
                  
                die("Db error");
            } 
             
            //Get the results of the query and put them into $row
            $row = $stmt->fetch(); 
            if($row) 
            { 
                die("This E-Mail address is already in use"); 
            } 
        } 

       /* //Check for new phone number
        if($_POST['phonenumber'] != $_SESSION['user']['phonenumber']){

            $query_params = array(
                ':phonenumber' => $_POST['phonenumber']
                );
        }*/
         
        //Check if the user entered a new password.
        
        if(!empty($_POST['password'])) 
        { 
            //Hash the password for security
            $password = hash('sha256', $_POST['password']); 
          
        } 
        else 
        { 
          //Do not change the password
          //if a new one was not provided  
            $password = null; 
       
        } 
         
        //Create an array for the arguments
        //of the query
        $query_params = array( 
            ':email' => $_POST['email'], 
            ':user_id' => $_SESSION['user']['id'],
            ':phonenumber' => $_POST['phonenumber'],
            ':address' => $_POST['address'] 
        ); 
         
        //Add parameters for password
        //if a new one was provided
        if($password !== null) 
        { 
            $query_params[':password'] = $password; 
            //$query_params[':salt'] = $salt; 
        } 
         

    //Create string for the MySQL query
        $query = "UPDATE useraccount SET email = :email, phonenumber = :phonenumber, address = :address "; 
         
        
        if($password !== null) 
        { 
            $query = $query . " 
                , password = :password 
            "; 
        } 
         
        $query = $query . "WHERE 
                id = :user_id 
        "; 
         
        try 
        { 
            //Perform the query with the arguments
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Db error");
        } 
         
       
       //update session variable with new email, if it changed
        $_SESSION['user']['email'] = $_POST['email'];
        $_SESSION['user']['phonenumber'] = $_POST['phonenumber'];
        $_SESSION['user']['address'] = $_POST['address']; 
         
        //Go back to home page after updating the user's information
        header("Location: db_main.php"); 
         
        die("Redirecting to db_main.php"); 
    } 
     
?> 
<!-- <h1>Edit Account</h1> 
<form action="edit_account.php" method="post"> 
    Username:<br /> 
    <b><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></b> 
    <br /><br /> 
    E-Mail Address:<br /> 
    <input type="text" name="email" value="<?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8'); ?>" /> 
    <br /><br /> 
    Password:<br /> 
    <input type="password" name="password" value="" /><br /> 
    <i>(leave blank if you do not want to change your password)</i> 
    <br /><br /> 
    <input type="submit" value="Update Account" /> 
</form> -->