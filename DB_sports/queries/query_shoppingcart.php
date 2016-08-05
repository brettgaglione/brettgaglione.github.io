<?php

	function queryCart($db) {

		$query = "SELECT * FROM shoppingcart WHERE userId = :userId";
		$query_params = array( 
            ':userId' => $_SESSION['user']['id']
        ); 
        
     	try 
    	{ 

        	// Execute the query against the database 
        	$stmt = $db->prepare($query);
        	$result = $stmt->execute($query_params); 
            
    	}
   	 	catch(PDOException $ex) 
    	{ 

           	echo("Db error"); 
    	} 

    	//Get list of rows (each product in shopping cart) 
      	return $stmt->fetchAll();
      	
	}
	function queryProduct($prodId, $db, $attribute) {

		switch ($attribute) {
			case 1: 
				$query = "SELECT id FROM product WHERE id = :prodId";
				$query_params = array( 
            		':prodId' => $prodId
        		); 
	     		try 
	    		{ 
		        	// Execute the query against the database 
		        	$stmt = $db->prepare($query);
		        	$result = $stmt->execute($query_params); 
	    		}
	   	 		catch(PDOException $ex) 
		    	{ 
		           	echo("Db error"); 
		    	} 
	    		//RETURN ID
	    		$rtn = $stmt->fetch();
	      		return $rtn['id'];
				break;
			case 2:
				$query = "SELECT name FROM product WHERE id = :prodId";
				$query_params = array( 
            		':prodId' => $prodId
        		); 
	     		try 
	    		{ 
		        	// Execute the query against the database 
		        	$stmt = $db->prepare($query);
		        	$result = $stmt->execute($query_params); 
	    		}
	   	 		catch(PDOException $ex) 
		    	{ 
		           	echo("Db error"); 
		    	} 
	    		//RETURN NAME
	    		$rtn = $stmt->fetch();
	      		return $rtn['name'];
				break;
			case 3:
				$query = "SELECT category FROM product WHERE id = :prodId";
				$query_params = array( 
            		':prodId' => $prodId
        		); 
	     		try 
	    		{ 
		        	// Execute the query against the database 
		        	$stmt = $db->prepare($query);
		        	$result = $stmt->execute($query_params); 
	    		}
	   	 		catch(PDOException $ex) 
		    	{ 
		           	echo("Db error"); 
		    	} 
	    		//RETURN CATEGORY
	    		$rtn = $stmt->fetch();
	      		return $rtn['category'];
				break;
			case 4:
				$query = "SELECT price FROM product WHERE id = :prodId";
				$query_params = array( 
            		':prodId' => $prodId
        		); 
	     		try 
	    		{ 
		        	// Execute the query against the database 
		        	$stmt = $db->prepare($query);
		        	$result = $stmt->execute($query_params); 
	    		}
	   	 		catch(PDOException $ex) 
		    	{ 
		           	echo("Db error"); 
		    	} 
	    		//RETURN PRICE
	    		$rtn = $stmt->fetch();
	      		return $rtn['price'];
				break;
			case 5:
				$query = "SELECT imgPath FROM product WHERE id = :prodId";
				$query_params = array( 
            		':prodId' => $prodId
        		); 
	     		try 
	    		{ 
		        	// Execute the query against the database 
		        	$stmt = $db->prepare($query);
		        	$result = $stmt->execute($query_params); 
	    		}
	   	 		catch(PDOException $ex) 
		    	{ 
		           	echo("Db error"); 
		    	} 
	    		//RETURN IMGPATH
	    		$rtn = $stmt->fetch();
	      		return $rtn['imgPath'];
				break;
			case 6:
				$query = "SELECT keywords FROM product WHERE id = :prodId";
				$query_params = array( 
            		':prodId' => $prodId
        		); 
	     		try 
	    		{ 
		        	// Execute the query against the database 
		        	$stmt = $db->prepare($query);
		        	$result = $stmt->execute($query_params); 
	    		}
	   	 		catch(PDOException $ex) 
		    	{ 
		           	echo("Db error"); 
		    	} 
	    		//RETURN KEYWORDS
	    		$rtn = $stmt->fetch();
	      		return $rtn['keywords'];
				break;

		}
		     	
	}

	function grandTotal($db) {

		$grndTotal = 0;
		$subTotal = 0;

		$query = "SELECT * FROM shoppingcart WHERE userId = :userId";
		$query_params = array(
			':userId' => $_SESSION['user']['id']
			);
		try 
		{ 	
        	// Execute the query against the database 
        	$stmt = $db->prepare($query);
        	$result = $stmt->execute($query_params); 
		}
 		catch(PDOException $ex) 
    	{ 
           	echo("Db error"); 
    	}

    	$rows = $stmt->fetchAll();

    	if ($rows){
    		foreach ($rows as $row) {
    			//returns price for prodId
				$subTotal = queryProduct($row['prodId'], $db, 4);
				//multiply by prodCount and add to grndTotal
				$grndTotal += ($subTotal * $row['prodCount']);
			}
    	}
    	return $grndTotal;
	}

	if(!empty($_POST)) {

		if ($_POST['removeall'] == "true"){

			$query = "DELETE FROM shoppingcart WHERE userId = :userId";
			$query_params = array(
				':userId' => $_SESSION['user']['id']
				);
			try 
    		{ 
	        	// Execute the query against the database 
	        	$stmt = $db->prepare($query);
	        	$result = $stmt->execute($query_params); 
    		}
   	 		catch(PDOException $ex) 
	    	{ 
	           	echo("Db error"); 
	    	}
		}

		else if ($_POST['quantity'] >= $_POST['stock']){

			$query = "DELETE FROM shoppingcart WHERE userId = :userId AND prodId = :prodId";
			$query_params = array(
				':userId' => $_SESSION['user']['id'],
				':prodId' => $_POST['prodId']
				);
			try 
    		{ 
	        	// Execute the query against the database 
	        	$stmt = $db->prepare($query);
	        	$result = $stmt->execute($query_params); 
    		}
   	 		catch(PDOException $ex) 
	    	{ 
	           	echo("Db error"); 
	    	} 
		}
		else if ($_POST['quantity'] > 0 && $_POST['quantity'] < $_POST['stock']){

			$query = "UPDATE shoppingcart SET prodCount = prodCount - :prodCount WHERE userId = :userId AND prodId = :prodId";
			$query_params = array(
				':userId' => $_SESSION['user']['id'],
				':prodId' => $_POST['prodId'],
				':prodCount' => intval($_POST['quantity'])
				);
			try 
    		{ 
	        	// Execute the query against the database 
	        	$stmt = $db->prepare($query);
	        	$result = $stmt->execute($query_params); 
    		}
   	 		catch(PDOException $ex) 
	    	{ 
	           	echo("Db error"); 
	    	}
		}
		else 
		{
			echo "Unable to remove items from shopping cart.";
		}
		unset($_POST['submit']);

	}


?>