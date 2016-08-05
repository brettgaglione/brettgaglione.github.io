<?php

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
		$gt = intval(grandTotal($db));
		if ($gt !== 0){

			//delete items from inventory - step 1 - GRAB ROWS FROM SHOPPINGCART
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

	    	//step 2 - DELETE FROM INVENTORY
	    	if ($rows){
	    		foreach ($rows as $row){

	    			$limit = intval($row['prodCount']);

    				$query = "DELETE FROM inventory WHERE prodId = :prodId LIMIT " . $limit;
    				$query_params = array(
    					':prodId' => $row['prodId'],
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
	    	}

	    	//step 3 - delete everything from shopping cart
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
		else {
			echo "You have nothing in your shopping cart!";

		}
		unset($_POST['submit']);

	}

?>