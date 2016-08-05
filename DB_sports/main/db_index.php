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
   	
<?php include '../login/login.php'; ?>
</head>

<body>

	<div class="main">
   	<div class="banner">
    <img src="../images/db_sports_banner3.png"/>
    </div>
   	  <div class="content_back"></div>
    	<div class="content" align="center" >
        <h1>Welcome</h1>
		<div class="fail"><?php echo $login_fail; ?> </div>	<br />
<form action="db_index.php" method="post">  
    <input type="text" placeholder="Username" name="username" value="<?php echo $submitted_username; ?>" />  
    <br /><br />   
    <input type="password" name="password" placeholder="Password" value="" /> 
    <br /><br /> 
    <input type="submit" name="submit" class="btn btn-primary" width="100" value="Login"/></br> </br><a class="btn btn-link btn-small" href="db_register.php">Register</a>
    </form>
       
        </div>
 	</div>
    
</body>
</html>