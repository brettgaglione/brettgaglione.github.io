<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
    
<html>
	<head>
    <title>MVP Athens</title>
    <link rel="stylesheet" type="text/css" href="../css/db_sports_index.css" />
    
    
    <link href="../login/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="../login/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="../carousel/jquery-1.6.min.js"></script>
   	
<?php include '../login/register.php'; ?>
</head>

<body>

	<div class="main">
    
    <div class="banner">
    <img src="../images/db_sports_banner3.png"/>
    </div>
   	  <div class="content_back_reg"></div>
    	<div class="content" align="center" >
        <h1>Register</h1> 
<form action="db_register.php" method="post"> 
    <input type="text" placeholder="Username" name="username" value="" />
    <br /><br /> 
    <input type="text" placeholder="Email" name="email" value="" /> 
    <br /><br />
    <input type="text" placeholder="Phone Number" name="phonenumber" value="" /> 
    <br /><br /> 
    <input type="text" placeholder="Address" name="address" value="" /> 
    <br /><br />  
    <input type="password" placeholder="Password" name="password" value="" /> 
    <br /><br /> 
    <input type="submit" name="submit" class="btn btn-primary" width="50" value="Register" /> 
</form> 
    </div>
    </div>
 	</div>
    
</body>
</html>