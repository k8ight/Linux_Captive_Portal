<?php 
session_start();



?>
<!doctype html>
<html>
<head>
  
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="shortcut icon" href="./bin/.images/favicon.ico">
   <title>ISP control</title>

   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/mobile.css">

   

</head>
<body link="black" vlink="black" >

<div id="container">
	<center><br><span id="log"><b><u>ISP Admin</u></b></span><center>
	<?php
	
	if(!empty($_SESSION["uname"]))
		
{
	echo('<br><p>Welcome <a href="./bin/profilefix.php">'.$_SESSION["uname"].'</a>;<h6>Login_Session:-'.md5($_SESSION["uname"]).'</h6><br>');
echo('
<center>
<a href="./register"><button class="btn span">Add NewUser</button></a>
<a href="./users"><button class="btn span">Portal Users</button></a>
<button class="btn span">System & Networking</button>
<a href="./ddns"><button class="btn span">DHCP&DNS</button></a>
<a href="./pack"><button class="btn span" >Pack & Price</button></a>
<a href="./bin/register.php"><button class="btn span" >Create new Admin/Mod</button></a>
<a href="./bin/logout.php"><button class="btn span">Logout</button></a>
</center></br>');






?>



<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	  
		
	<div id='container1'> 
	<object data="https://<?php echo $_SERVER['SERVER_ADDR'];?>:9090/system" style="width:99%;height:99%;">
    <embed src="https://<?php echo $_SERVER['SERVER_ADDR'];?>:9090/system" style="width:99%;height:99%;"> </embed>
    
</object>
	</div>
<?php

}
else
{
	
echo ('<center><a href="./bin/login.php">
<button class="btn span">Login</button></a>
<br><span style="font-size:32px;font-family: sans-serif;" color="red">ADMIN PANEL LOGIN REQUIRED</span></center></br>');
}
?>
</body>
</html>
