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
include '../queries/query_checkout.php';
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
    <h1>Checkout</h1>
    <h6><i>(A confimation message will be sent via registered email)</i></h6>
    <h4>Grand Total: <b class="money_color">$<?php echo htmlentities(grandTotal($db), ENT_QUOTES, 'UTF-8');?></b></h4>
    </div>
    
    <div class="shopping_button">
    </br>
    <form action="" method="post">
        
    
    <input type="submit" name="submit" class="btn btn-success btn-block" value="Checkout" />
    </form>
    </br>
    <a href="db_shoppingcart.php" class="btn btn-danger btn-block">Cancel</a>
    </div>
    
</div>
  
  
  
  </div>
  </body>
  </html>