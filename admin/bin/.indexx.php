<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<center>
<a href="logout.php"><button>Logout</button></a><br /><br /><br /><br />

</div><center>
<p><iframe class="tmblr-iframe tmblr-iframe--desktop-loggedin-controls iframe-controls--desktop" name="desktop-loggedin-controls"id="b" height="1000" width="900" src="https://172.21.167.72/gamebase88/"></iframe></p></center>




</body>
</html>
