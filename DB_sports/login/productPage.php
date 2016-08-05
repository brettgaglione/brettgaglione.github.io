<?php
 
    require("common.php"); 
     
    //Check that a user is logged in 
    if(empty($_SESSION['user'])) 
    { 
        
        header("Location: login.php"); 
         

        die("Redirecting to login.php"); 
    } 
     
   
	//Create the string for the query
	//The query gives us the amount of items currently in inventory that can be sold.
	 $query = "SELECT COUNT(tagNumber) FROM inventory WHERE prodId = :prodId";
	 $query_params = array (
		':prodId' => $_GET['prodId'],
	 );
	 $productCount = 0;
	 try 
			{ 
            //Perform the query, and store the result in $productCount
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
				$num = $stmt->fetch();
				$productCount = intval($num['COUNT(tagNumber)']);
				//var_dump($num);
				
			}
	catch(PDOException $ex) 
			{   
				die("Db error");
			} 
		
	 

	//Check if the form has been submitted
	 if (isset($_POST['submit'])) {
			
		if(!empty($_POST)) {
			
			//This checks that the user entered an amount
			//less than or equal to the amount of items in inventory.
			if($_POST['prodCount'] <= $productCount ) {
			
			
			//Create the string for the MySQL query
			//The query adds items to the users shopping cart
			$query = "INSERT INTO shoppingcart VALUES (:userId , :prodId , :prodCount)"; 
			$query_params = array( 
            			':userId' => $_SESSION['user']['id'],
				':prodId' => $_GET['prodId'],
				':prodCount' => $_POST['prodCount'],
			
      			);	 

			try 
			{ 
         			//Perform the query, inserting into shoppingcart
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			
			echo "Successfully added " . $_POST['prodCount'] . " items to cart";	
				
				
			} 
			catch(PDOException $ex) 
			{ 
				
				echo("Db error");
			} 
				
		}//check if there are enough products
		else {
			echo "Sorry we do not have that many items in stock";
		
		}
		
			
	}
	
}

?>

<form action="" method="post"> 
	Product Count (<?php echo $productCount; ?> left) : 
	<input type="number" name="prodCount" value="" /> 
    <br /><br /> 
    <input type="submit" name="submit" id="submit" value="Add Item to Cart" /> 
</form> 