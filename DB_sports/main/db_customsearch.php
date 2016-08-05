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
include '../queries/query_category.php';
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
    
    <div class="search">
    <!--<form action="" method="post">
    <input type="text" name="search" placeholder="Search..." value="" />
    <input type="submit" class="btn" value="Search" />  
    </form>-->
    <form class="navbar-search pull-left" action="db_customsearch.php" method="post">
        <input type="hidden" name="activeSearch" value="true" />
    	<input type="text" name="search" class="search-query" placeholder="Search" value=""/>
    </form>
    
    </div>
  </div>
<div class="shopping_content" align="center">
<div class="shopping_back"></div>
	
    
    <div class="shopping_title">
    <h1>Search Results</h1>
    <!--<h5><i>keyword(s): <?php echo htmlentities($_POST['search'], ENT_QUOTES, 'UTF-8'); ?> </i></h5>-->
    </div>
     
</div>
<div> 

<div class="cap_contents" align="center">
	<?php 
		if ($search_contents) {
			
			foreach ($search_contents as $productNo) { ?>
            
			<div class="tile_contents">
    		
            <div class="pic_frame">
        	<img src="<?php echo htmlentities(
			queryProduct($productNo, $db, 5),
			ENT_QUOTES, 'UTF-8');?>" 
            width="175px" height="175px" />
        	</div>
            
            <div class="content_frame">
            <h3><?php echo htmlentities(
			queryProduct($productNo, $db, 2),
			ENT_QUOTES, 'UTF-8');?></h3>
            
            <h4>Price: <b class="money_color">$<?php echo htmlentities(
			queryProduct($productNo, $db, 4), 
			ENT_QUOTES, 'UTF-8');?></b></h4>
            <br>
            <h6>Product ID: <?php echo htmlentities(
			queryProduct($productNo, $db, 1), 
			ENT_QUOTES, 'UTF-8');?> </br></h6>
            </div>
            
            <div class="stock_frame">
            </br></br>
        	<h4>Stock: <?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?></h4></br>
        
            <form action="" method="post">
        <input type="hidden" name="prodId" value="<?php echo htmlentities($productNo, ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="stock" value="<?php echo htmlentities(queryStock($productNo, $db), ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="activeSearch" value="false" />
        <!--<input type="hidden" name="search" value="<?php echo htmlentities($search_contents, ENT_QUOTES, 'UTF-8'); ?>" />-->
        <input type="text" class="input-small" placeholder="Quantity" name="quantity" value="" size="3" />
        <input type="submit" name="submit" class="btn btn-primary" value="Add"/>
        </form>  
            </div>	
            
    		</div>

	<?php }}//if and foreach ?>	
</div>


</div>
  
   

</body>
</html>