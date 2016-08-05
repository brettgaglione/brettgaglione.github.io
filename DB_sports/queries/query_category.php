<?php 

	//require("../login/common.php"); 
	
	//$rows = null;

	function queryCategory($category, $db) {

		$query = "SELECT * FROM product WHERE category = :category";
		$query_params = array( 
            ':category' => $category
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

    	//Get list of rows (each product offered) 
      	return $stmt->fetchAll();
      	
	}

	function queryStock($productNo, $db) {

		$query = "SELECT COUNT(tagNumber) FROM inventory WHERE prodId = :prodId";
		$query_params = array(
			':prodId' => $productNo
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
		catch (PDOException $ex)
		{
			die("Db error");
		}

		return $productCount;
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


	 //Check if the form has been submitted
	 //if (isset($_POST['submit'])) {
		
		$search_contents = array();

		if(!empty($_POST)) {
			
			/*if ($_POST['pre_search']) {
				$search_contents = $_POST['pre_search'];
			}
			else */if ($_POST['activeSearch'] == "true") {

				//obtain each product offered
				$query = "SELECT id, keywords FROM product";
				$query_params = array(
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

	    		// rows contains id and keywords of ALL products
		    	$rows = $stmt->fetchAll();

		    	if ($rows) {

		    		foreach ($rows as $row){
		    			//obtain the keywords for the active product
		    			$prodKeys = explode(", ", $row['keywords']);

		    			//obtain the search keywords
						$search_keywords = explode(" ", $_POST['search']);

						//double foreach to find matching keywords
						foreach ($prodKeys as $prodKey) {
							foreach ($search_keywords as $srch_key) {
								if (strcasecmp($prodKey, $srch_key) === 0){//$prodKey == $srch_key
									array_push($search_contents, $row['id']);
									break 2;
								}
							}
						}
		    		}
		    	}
			}
			//This checks that the user entered an amount
			//less than or equal to the amount of items in inventory.
			else if($_POST['quantity'] <= $_POST['stock'] && $_POST['quantity'] != 0) {

				//Check to see if userId, prodId already exist -> UPDATE prodCount
				$query = "SELECT 1 FROM shoppingcart WHERE userId = :userId AND prodId = :prodId";
				$query_params = array(
					':userId' => $_SESSION['user']['id'],
					':prodId' => $_POST['prodId']
					);			
				try 
				{ 
	         		//Perform the query, inserting into shoppingcart
					$stmt = $db->prepare($query); 
					$result = $stmt->execute($query_params); 
				
					//echo "Successfully added " . $_POST['quantity'] . " items to cart";	
				} 
				catch(PDOException $ex) 
				{ 
					echo("Db error");
				} 

				//userId, prodId pair exist -> update count
				if ($stmt->fetch()) {
					$query = "UPDATE shoppingcart SET prodCount = prodCount + :prodCount WHERE userId = :userId AND prodId = :prodId";
					$query_params = array(
						':userId' => $_SESSION['user']['id'],
						':prodId' => $_POST['prodId'],
						':prodCount' => intval($_POST['quantity'])
						);
					try 
					{ 	
         				//Perform the query, inserting into shoppingcart
						$stmt = $db->prepare($query); 
						$result = $stmt->execute($query_params); 
						//echo "Successfully added " . $_POST['quantity'] . " items to cart";	
					} 
					catch(PDOException $ex) 
					{ 	
					echo("Db error");
					}
				}
				else {

					//Create the string for the MySQL query
					//The query adds items to the users shopping cart
					$query = "INSERT INTO shoppingcart VALUES (:userId , :prodId , :prodCount)"; 
					$query_params = array( 
		    			':userId' => $_SESSION['user']['id'],
						':prodId' => $_POST['prodId'],
						':prodCount' => $_POST['quantity']
		      			);	 

					try 
					{ 
		         			//Perform the query, inserting into shoppingcart
						$stmt = $db->prepare($query); 
						$result = $stmt->execute($query_params); 
					
						//echo "Successfully added " . $_POST['quantity'] . " items to cart";	
					} 
					catch(PDOException $ex) 
					{ 
						echo("Db error");
					} 

					// UNSET THE POST SO IT WILL BE READY FOR THE NEXT ADD
					
				}
				unset($_POST['submit']);
			/*// DELETE ITEMS FROM INVENTORY ---------------------------------
			$query = "DELETE FROM inventory WHERE prodId = :prodId LIMIT :quantity";
			$query_params = array(
				':prodId' => $prodId,
				':quantity' => intval($_POST['quantity']),				
				//':quantity' => $quantity
				);

			try 
			{ 
         		//Perform the query, deleting from inventory
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			
				//echo "Successfully deleted " . $_POST['quantity'] . " items from inventory";	
			} 
			catch(PDOException $ex) 
			{ 
				echo("Db error");
			} */
			// ----------------------------------------------------------------	
			}//check if there are enough products
			else {
				echo "Sorry we do not have that many items in stock";
		
			}
		
			
		}
	

	//}
	
?>