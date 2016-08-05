<?php

    require("common.php"); 
     
    //Check that a user is currently logged on
    if(empty($_SESSION['user'])) 
    { 
        //Go to login page if not
        header("Location: login.php"); 
         
        die("Redirecting to login.php"); 
    } 
     
    $query = "SELECT * FROM shoppingcart WHERE userId = :userId";
    $query_params = array( 
            ':userId' => $_SESSION['user']['id'],
        ); 
        
     try 
    { 
        // Execute the query against the database 
        $stmt = $db->prepare($query); 
        $result = $stmt->execute($query_params); 
            
    }
    catch(PDOException $ex) 
    { 
    
        die("Db error"); 
    } 
    
    //Get list of rows (each item in shopping cart) 
      $rows = $stmt->fetchAll(); 
?>
      
      <table> 
    <tr> 
        <th>Product</th> 
        <th>Count</th> 
    </tr> 
    <?php foreach($rows as $row): ?> 
        <tr>
            <td><?php echo htmlentities($row['prodId'], ENT_QUOTES, 'UTF-8'); ?></td> 
            <td><?php echo htmlentities($row['prodCount'], ENT_QUOTES, 'UTF-8'); ?></td> 
        </tr> 
    <?php endforeach; ?> 
</table> 




