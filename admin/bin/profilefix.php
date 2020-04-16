  <style>
  body {

    overflow:hidden;
	
	height:100%;
	width:80%;
	left:50px;
	color: #333;
	font: 16px Arial;
	padding: 50px;
	background-image: url(./.images/gbase.jpg);
    background-position: center;
   
}
  #container {
	
	
	height: 550px;
	width:500px;
	box-shadow: 0 5px 10px -5px rgba(0,0,0,0.5);
	background: white; 
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
    filter: alpha(opacity=30);
     opacity: 0.90;
}
#a
{
	padding: 5px 12.5px 4px; 
	color: #fff; 
	background-color: Green;
	text-shadow: rgba(0,0,0,0.24) 0 1px 0; 
	font-size: 16px; 
	box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; 
	border: 1px solid green; 
	border-radius: 2px;
	margin-top: 10px;
 cursor:pointer
  </style>
  
<center><div id="container"><h4>
<?php session_start();
echo 'profile Option for-'.$_SESSION["usern"].',&nbsp;&nbsp;on Email:-'.$_SESSION["uname"];
echo '<br> With One time session Id-'.md5(rand()).' Replacing Parmament Session Id='.md5($_SESSION["uname"]);
?></h4>
<a href="po/si.php"><button id="a">Show My Info</button></a><br>
<a href="po/cp.php"><button id="a">Change Password</button></a><br>
 <a href="po/ce.php"><button id="a">Change Email</button></a><br>
<a href="sg.crt"><button id="a" height="20" width="40">INSTALL Trusted Certificate </button><h5>for unknown ISSUER error</h5></a><br>
<a href="../"><button id="a">Back To Main page</button></a>
</div>
</center>