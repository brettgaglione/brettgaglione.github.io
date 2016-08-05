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
include '../login/edit_account.php';
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
  
  <div class="content_back_edit"></div>
    	<div class="content" align="center" >
        <h1>Edit Account</h1>
		<form action="db_editaccount.php" method="post"> 
    Username:<br /> 
    <b><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></b> 
    <br /><br /> 
    E-Mail Address:<br /> 
    <input type="text" name="email" value="<?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8'); ?>" /> 
    <br /><br /> 
    Phone Number:<br /> 
    <input type="text" name="phonenumber" value="<?php echo htmlentities($_SESSION['user']['phonenumber'], ENT_QUOTES, 'UTF-8'); ?>" /> 
    <br /><br /> 
    Address:<br /> 
    <input type="text" name="address" value="<?php echo htmlentities($_SESSION['user']['address'], ENT_QUOTES, 'UTF-8'); ?>" /> 
    <br /><br /> 
    Password:<br /> 
    <input type="password" name="password" value="" /><br /> 
    <i>(leave blank if you do not want to change your password)</i> 
    <br /><br /> 
    <input type="submit" name="submit" class="btn btn-primary" value="Update Account" /> 
</form>
       
        </div>
  
  
  
  </div>
      
</body>
</html>