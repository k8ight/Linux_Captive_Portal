<?php
/*
Author: Sounak Kqr
Website: http://skrisdanny.blogspot.com
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="../style2.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['pwd'])){
		
		$pn=$_POST['pn'];
		$pwd=$_POST['pwd'];
       $cpwd=$_POST['cpwd'];
	   
		$sql = "DELETE FROM users WHERE email='".$_SESSION['uname']."' and password='".md5($cpwd)."' and username='".$pn."'";

if ($con->query($sql) === TRUE) {
	if(session_destroy()) // Destroying All Sessions
{
	session_start();
	
	$msg="<br>___________________________<a href='./.bin/po/cm.php' title='close This Message'><button><b>X</b></button></a>";
$msg1="Profile DELETED PLEASE Register Again to Download ";
	$_SESSION['change88']=$msg1.$msg;
   header("Location: ../../");
}
	
} else {
    echo "Error updating record: " . $con->error;
}
		

    }else{
?>
<div id="containerA1">
<center><h1>Change Username</h1>
<form action="" method="post" name="login">
<input type="text" name="pn" placeholder="Current UserName" required />
<input type="email" name="pwd" placeholder="Current E-Mail" required />
<input type="password" name="cpwd" placeholder="Current Password" required />
<input name="submit" type="submit" value="DELETE" />
</form>


<br /><br />
</center>
</div>
<?php } ?>


</body>
</html>
