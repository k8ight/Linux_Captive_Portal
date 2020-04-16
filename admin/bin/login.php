
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<?php
require('db.php');
$sqla = "SELECT * FROM `padmin`";
$resulta = mysqli_query($con,$sqla) or die(mysql_error());
if ($resulta->num_rows < 1) {
	header("LOCATION: ./register.php");
}



require('db.php');	
	session_start();
	 $msgg = urldecode($_REQUEST["error"]);
	 if($msgg=='201')
	 { $jtg='<h6>!!Login Required!!</h6>';
 }
 else{$jtg='';} 
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email);//escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
       $sql = "SELECT * FROM `padmin` WHERE email='$email' and password='".md5($password)."'";
		$result = mysqli_query($con,$sql) or die(mysql_error());
		
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         			
			$_SESSION['usern']=$row['username'];
			$_SESSION['uname'] = $row["email"];
			$_SESSION['zone'] = $row["zone"];
	}
			header("Location: ../"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>E-mail/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div id="container">
<center><span>Admin Login</span>
<span style="color:Red"><h6><?php echo $jtg;?></h6></span>
<form action="" method="post" name="login">
<input type="email" id="username" name="email" placeholder="E-mail" onkeyup="myFunction()" required />
<input type="password" id="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" id="submit" value="Login" />
</form>
<!--<script>function myFunction() {document.getElementById('submit').click();}</script>-->
 

<br /><br />
</center>
</div>
<?php } ?>


</body>
</html>
