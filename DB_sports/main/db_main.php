<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
    <title>MVP Athens</title>
    <link rel="stylesheet" type="text/css" href="../css/db_sports.css" />
    
     <link href="../login/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--<script src="../login/bootstrap/js/bootstrap.min.js"></script>-->
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="../carousel/jquery-1.6.min.js"></script>
    <script type="text/javascript" src="../carousel/jquery.roundabout.min.js"></script>
<script type="text/javascript" src="../carousel/carousel.js"></script>
		
<script src="../javascript/animation.js"></script>
</head>

<?php 
include '../login/private.php'; 
include '../queries/query_category.php';
?>


<body>

<div class="my_carousel">
    
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
    	<input type="text" name="search" class="search-query" placeholder="Search" value="">
    </form>
    
    </div>
  </div>
    
  <div class="carousel_container">
        
       	  <div id="carousel"></div>
    <img src="../images/arrow_left.png" class="nextItem" />
      <img src="../images/arrow_right.png" class="prevItem"/>
    </div>
        <div class="caption_container">
        	<div id="captions"></div>
        </div>
        
        <div class="carousel_data">
        
        <!-- begin items -->

<!-- Item -->
<div class="carousel_item">
	<div class="image">
		<img src="../images/baseball-icon.png" alt="baseball-icon" />
	</div>
	<div class="caption">
		
        <h2>Baseball</h2>
		</br>
        <div class="cap_contents">
        <?php foreach (queryCategory(1, $db) as $row) { 
		?>
        <div class="tile_contents">
		<div class="pic_frame">
        	<img src= "<?php echo htmlentities($row['imgPath'], ENT_QUOTES, 'UTF-8'); ?>" width="175px" height="175px" /></div>
        <div class="content_frame">
        <h3><?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8');?></h3>
        
        <h4>Price: <b class="money_color">$<?php echo htmlentities($row['price'], ENT_QUOTES, 'UTF-8');?></b></h4>
        </br>
        <h6>Product ID: <?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?> </br>
        <!--Keywords: <?php echo htmlentities($row['keywords'], ENT_QUOTES, 'UTF-8');?>--></h6>
        </div>
        <div class="stock_frame">
        </br></br>
        <h4>Stock: <?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?></h4></br>
        
        <form action="" method="post">
        <input type="hidden" name="prodId" value="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="stock" value="<?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="activeSearch" value="false" />
        <input type="text" class="input-small" placeholder="Quantity" name="quantity" value="" size="3" />
        <input type="submit" name="submit" class="btn btn-primary" value="Add"/>
        </form> 
        
        </div>
       
        </div>
        
        <?php } ?>
        
        </div>
        
	</div>
</div>

<!-- Item -->
<div class="carousel_item">
	<div class="image">
		<img src="../images/football-icon.png" alt="football-icon" />
	</div>
	<div class="caption">
    	
		<h2>Football</h2>
		</br>
        <div class="cap_contents">
        <?php foreach (queryCategory(2, $db) as $row) { 
		?>
        <div class="tile_contents">
		<div class="pic_frame">
        	<img src= "<?php echo htmlentities($row['imgPath'], ENT_QUOTES, 'UTF-8'); ?>" width="175px" height="175px" /></div>
        <div class="content_frame">
        <h3><?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8');?></h3>
        
        <h4>Price: <b class="money_color">$<?php echo htmlentities($row['price'], ENT_QUOTES, 'UTF-8');?></b></h4>
        </br>
        <h6>Product ID: <?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?> </br>
        <!--Keywords: <?php echo htmlentities($row['keywords'], ENT_QUOTES, 'UTF-8');?>--></h6>
        </div>
        <div class="stock_frame">
        </br></br>
        <h4>Stock: <?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?></h4></br>
        
        <form action="" method="post">
        <input type="hidden" name="prodId" value="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="stock" value="<?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="activeSearch" value="false" />
        <input type="text" class="input-small" placeholder="Quantity" name="quantity" value="" size="3" />
        <input type="submit" name="submit" class="btn btn-primary" value="Add"/>
        </form> 
        
        </div>
       
        </div>
        
        <?php } ?>
        
        </div>
        
	</div>
</div>

<!-- Item -->
<div class="carousel_item">
	<div class="image">
		<img src="../images/basketball-icon.png" alt="basketball-icon" />
	</div>
	<div class="caption">
		
        <h2>Basketball</h2>
		</br>
        <div class="cap_contents">
<?php foreach (queryCategory(3, $db) as $row) { 
		?>
        <div class="tile_contents">
		<div class="pic_frame">
        	<img src= "<?php echo htmlentities($row['imgPath'], ENT_QUOTES, 'UTF-8'); ?>" width="175px" height="175px" /></div>
        <div class="content_frame">
        <h3><?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8');?></h3>
        
        <h4>Price: <b class="money_color">$<?php echo htmlentities($row['price'], ENT_QUOTES, 'UTF-8');?></b></h4>
        </br>
        <h6>Product ID: <?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?> </br>
        <!--Keywords: <?php echo htmlentities($row['keywords'], ENT_QUOTES, 'UTF-8');?>--></h6>
        </div>
        <div class="stock_frame">
        </br></br>
        <h4>Stock: <?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?></h4></br>
        
        <form action="" method="post">
        <input type="hidden" name="prodId" value="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="stock" value="<?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="activeSearch" value="false" />
        <input type="text" class="input-small" placeholder="Quantity" name="quantity" value="" size="3" />
        <input type="submit" name="submit" class="btn btn-primary" value="Add"/>
        </form> 
        
        </div>
       
        </div>
        
        <?php } ?>
        
        </div>
	</div>
</div>			

<!-- Item -->
<div class="carousel_item">
	<div class="image">
		<img src="../images/tennis-icon.png" alt="tennis-icon" />
	</div>
	<div class="caption">
		
        <h2>Tennis</h2>
		</br>
        <div class="cap_contents">
        <?php foreach (queryCategory(4, $db) as $row) { 
		?>
        <div class="tile_contents">
		<div class="pic_frame">
        	<img src= "<?php echo htmlentities($row['imgPath'], ENT_QUOTES, 'UTF-8'); ?>" width="175px" height="175px" /></div>
        <div class="content_frame">
        <h3><?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8');?></h3>
        
        <h4>Price: <b class="money_color">$<?php echo htmlentities($row['price'], ENT_QUOTES, 'UTF-8');?></b></h4>
        </br>
        <h6>Product ID: <?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?> </br>
        <!--Keywords: <?php echo htmlentities($row['keywords'], ENT_QUOTES, 'UTF-8');?>--></h6>
        </div>
        <div class="stock_frame">
        </br></br>
        <h4>Stock: <?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?></h4></br>
        
        <form action="" method="post">
        <input type="hidden" name="prodId" value="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="stock" value="<?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="activeSearch" value="false" />
        <input type="text" class="input-small" placeholder="Quantity" name="quantity" value="" size="3" />
        <input type="submit" name="submit" class="btn btn-primary" value="Add"/>
        </form> 
        
        </div>
       
        </div>
        
        <?php } ?>
        
        </div>
	</div>
</div>

<!-- Item -->
<div class="carousel_item">
	<div class="image">
		<img src="../images/soccer-icon.png" alt="soccer-icon" />
	</div>
	<div class="caption">
		
        <h2>Soccer</h2>
		</br>
        <div class="cap_contents">
        <?php foreach (queryCategory(5, $db) as $row) { 
		?>
        <div class="tile_contents">
		<div class="pic_frame">
        	<img src= "<?php echo htmlentities($row['imgPath'], ENT_QUOTES, 'UTF-8'); ?>" width="175px" height="175px" /></div>
        <div class="content_frame">
        <h3><?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8');?></h3>
        
        <h4>Price: <b class="money_color">$<?php echo htmlentities($row['price'], ENT_QUOTES, 'UTF-8');?></b></h4>
        </br>
        <h6>Product ID: <?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?> </br>
        <!--Keywords: <?php echo htmlentities($row['keywords'], ENT_QUOTES, 'UTF-8');?>--></h6>
        </div>
        <div class="stock_frame">
        </br></br>
        <h4>Stock: <?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?></h4></br>
        
        <form action="" method="post">
        <input type="hidden" name="prodId" value="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="stock" value="<?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="activeSearch" value="false" />
        <input type="text" class="input-small" placeholder="Quantity" name="quantity" value="" size="3" />
        <input type="submit" name="submit" class="btn btn-primary" value="Add"/>
        </form> 
        
        </div>
       
        </div>
        
        <?php } ?>
        
        </div>
	</div>
</div>

<!-- Item -->
<div class="carousel_item">
	<div class="image">
		<img src="../images/golf-icon.png" alt="golf-icon" />
	</div>
	<div class="caption">
		
        <h2>Golf</h2>
		</br>
        <div class="cap_contents">
        <?php foreach (queryCategory(6, $db) as $row) { 
		?>
        <div class="tile_contents">
		<div class="pic_frame">
        	<img src= "<?php echo htmlentities($row['imgPath'], ENT_QUOTES, 'UTF-8'); ?>" width="175px" height="175px" /></div>
        <div class="content_frame">
        <h3><?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8');?></h3>
        
        <h4>Price: <b class="money_color">$<?php echo htmlentities($row['price'], ENT_QUOTES, 'UTF-8');?></b></h4>
        </br>
        <h6>Product ID: <?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?> </br>
        <!--Keywords: <?php echo htmlentities($row['keywords'], ENT_QUOTES, 'UTF-8');?>--></h6>
        </div>
        <div class="stock_frame">
        </br></br>
        <h4>Stock: <?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?></h4></br>
        
        <form action="" method="post">
        <input type="hidden" name="prodId" value="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="stock" value="<?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="activeSearch" value="false" />
        <input type="text" class="input-small" placeholder="Quantity" name="quantity" value="" size="3" />
        <input type="submit" name="submit" class="btn btn-primary" value="Add"/>
        </form> 
        
        </div>
       
        </div>
        
        <?php } ?>
        
        </div>
	</div>
</div>
				
<!-- Item -->
<div class="carousel_item">
	<div class="image">
		<img src="../images/trophy-icon.png" alt="trophy-icon" />
	</div>
	<div class="caption">
		
        <h2>Fan Shop</h2>
		</br>
        <div class="cap_contents">
        <?php foreach (queryCategory(9, $db) as $row) { 
		?>
        <div class="tile_contents">
		<div class="pic_frame">
        	<img src= "<?php echo htmlentities($row['imgPath'], ENT_QUOTES, 'UTF-8'); ?>" width="175px" height="175px" /></div>
        <div class="content_frame">
        <h3><?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8');?></h3>
        
        <h4>Price: <b class="money_color">$<?php echo htmlentities($row['price'], ENT_QUOTES, 'UTF-8');?></b></h4>
        </br>
        <h6>Product ID: <?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?> </br>
        <!--Keywords: <?php echo htmlentities($row['keywords'], ENT_QUOTES, 'UTF-8');?>--></h6>
        </div>
        <div class="stock_frame">
        </br></br>
        <h4>Stock: <?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?></h4></br>
        
        <form action="" method="post">
        <input type="hidden" name="prodId" value="<?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="stock" value="<?php echo htmlentities(queryStock($row['id'], $db), ENT_QUOTES, 'UTF-8');?>" />
        <input type="hidden" name="activeSearch" value="false" />
        <input type="text" class="input-small" placeholder="Quantity" name="quantity" value="" size="3" />
        <input type="submit" name="submit" class="btn btn-primary" value="Add"/>
        </form> 
        
        </div>
       
        </div>
        
        <?php } ?>
        
        </div>
	</div>
</div>

<!-- end items -->

        </div>
</div>
    
</body>
</html>