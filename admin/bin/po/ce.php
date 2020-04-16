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
		
		$cp =$_POST['cp'];
		$pwd=$_POST['pwd'];
       $cpwd=$_POST['cpwd'];
	   if($pwd==$cpwd){
		$sql = "UPDATE users SET email='".$pwd."' WHERE email='".$_SESSION['uname']."'";

if ($con->query($sql) === TRUE) {
	$msg="<br>___________________________<a href='./.bin/po/cm.php' title='close This Message'><button><b>X</b></button></a>";
	$msg1="CHANGE DONE PLEASE RE LOGIN";
	$_SESSION['change88']=$msg1.$msg;
   header("Location: ../../");
} else {
    echo "Error updating record: " . $con->error;
}
		}else{ echo"<div id=container><h1>Please input same E-mail in Confirm E-mail and New E-mail Field</h1><a href=><button id='a'>ReChange</button></a></div>";}
		

    }else{
?>
<div id="containerA1">
<center><h1>Change E-Mail</h1>
<form action="" method="post" name="login">
<input type="email" name="cp" placeholder="Current E-Mail" required />
<input type="email" name="pwd" placeholder="New E-mail" required />
<input type="email" name="cpwd" placeholder="Confirm Email" required />
<input name="submit" type="submit" value="Change" />
</form>

<br /><br />
</center>
</div>
<?php } ?>


</body>
</html>
