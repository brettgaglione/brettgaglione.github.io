<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
    <title>MVP Athens</title>
    <link rel="stylesheet" type="text/css" href="../css/db_sports_index.css" />
    
     <link href="../login/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="../login/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    
		
<script src="../javascript/animation.js"></script>
</head>

<?php 
include '../login/private.php'; 
include '../queries/query_shoppingcart.php';
?>

<body>
<div class="main">
 <div class="banner">
    <img src="../images/db_sports_banner3.png"/>
    <div class="iconText"></div>
    <div class="icon">
    	<a href="../login/logout.php"><img src="../images/logout-icon.png" width="50px" height="50px" /></a>
    </div>
    <div class="icon2">
   	  <a href="db_editaccount.php"><img src="../images/edit-icon.png" width="60px" height="60px"/></a>
    </div>
    <div class="icon3">
    	<a href="db_shoppingcart.php"><img src="../images/shopping-cart.png" width="100px" height="100px"/></a>
    </div>
    <div class="icon4">
		<a href="db_main.php"><img src="../images/home2.png" width="50px" height="41px" /></a>    
    </div>
  </div>
<div class="shopping_content" align="center">
<div class="shopping_back"></div>
	<div class="user_info">
	<h4>Username:</h4>
    <h5><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');?></5>
    </br></br>
    <h4>Email:</h4>
    <h5><?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8');?></5>
	</div>
    
    <div class="shopping_title">
    <h1>Shopping Cart</h1></br>
    <h4>Grand Total: <b class="money_color">$<?php echo htmlentities(grandTotal($db), ENT_QUOTES, 'UTF-8');?></b></h4>
    </div>
    
    <div class="shopping_button">
    </br>
    <a href="db_checkout.php" class="btn btn-success btn-block">Checkout</a>
    </br></br>
    <form action="" method="post">
    <input type="hidden" name="removeall" value="true" />
    <input type="submit" name="submit" class="btn btn-danger btn-block" value="Remove All" />
    </form>
    
    </div>
    
</div>
<div> 

<div class="cap_contents" align="center">
	<?php 
		if (queryCart($db)) {
			foreach (queryCart($db) as $row) { ?>
            
			<div class="tile_contents">
    		
            <div class="pic_frame">
        	<img src="<?php echo htmlentities(
			queryProduct($row['prodId'], $db, 5),
			ENT_QUOTES, 'UTF-8');?>" 
            width="175px" height="175px" />
        	</div>
            
            <div class="content_frame">
            <h3><?php echo htmlentities(
			queryProduct($row['prodId'], $db, 2),
			ENT_QUOTES, 'UTF-8');?></h3>
            
            <h4>Subtotal: <b class="money_color">$<?php echo htmlentities(
			queryProduct($row['prodId'], $db, 4) *
			$row['prodCount'], 
			ENT_QUOTES, 'UTF-8');?></b></h4>
            
            <h5><i>(<?php echo htmlentities(
			$row['prodCount'],
			ENT_QUOTES, 'UTF-8');?> X <b class="money_color">$<?php 
			echo htmlentities(
			queryProduct($row['prodId'], $db, 4), 
			ENT_QUOTES, 'UTF-8');?></b>)</i></h5>
            </br>
            <h6>Product ID: <?php echo htmlentities(
			queryProduct($row['prodId'], $db, 1), 
			ENT_QUOTES, 'UTF-8');?> </br></h6>
            </div>
            
            <div class="stock_frame">
            </br></br></br>
            <form action="" method="post">
            <input type="hidden" name="removeall" value="false" />
        	<input type="hidden" name="prodId" 
            value="<?php echo htmlentities($row['prodId'],
			 ENT_QUOTES, 'UTF-8');?>" />
        	<input type="hidden" name="stock" 
            value="<?php echo htmlentities(
			$row['prodCount'], 
			ENT_QUOTES, 'UTF-8');?>" />
        	<input type="text" class="input-small" 
        	placeholder="Quantity" name="quantity" 
            value="" size="3" />
        	<input type="submit" class="btn btn-danger"
             value="Remove"/>
        	</form> 
            </div>
            
    		</div>

	<?php }}//if and foreach ?>	
</div>


</div>
  
   

</body>
</html>