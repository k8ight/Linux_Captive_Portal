<!doctype html>
<html>
<head>
  
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="shortcut icon" href="../bin/.images/favicon.ico">
   <title>ISP control</title>

   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/mobile.css">

   

</head>
<body link="black" vlink="black" >

<div id="container">
	<center><br><span id="log"><b><u>ISP Admin</u></b></span><center>
	<?php
	session_start();
	if(!empty($_SESSION["uname"]))
		
{
	echo('<br><p>Welcome <a href="../bin/profilefix.php">'.$_SESSION["uname"].'</a>;<h6>Login_Session:-'.md5($_SESSION["uname"]).'</h6><br>');
echo('
<center>
<a href="../register"><button class="btn span">Add NewUser</button></a>
<a href="../users"><button class="btn span">Portal Users</button></a>
<a href="../"><button class="btn span">System & Networking</button></a>
<a href="../ddns"><button class="btn span" >DHCP&DNS</button></a>
<a href="../pack"><button class="btn span" >Pack & Price</button></a>
<a href="../bin/logout.php"><button class="btn span">Logout</button></a>
</center></br>');


?>
<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	


<div id='container1'>
<?php
 $pwdgen = mt_rand(100000,999999); 
require('../db.php');


    // If form submitted, insert values into the database.
    if (isset($_REQUEST['name'])){
		
		$name = stripslashes($_REQUEST['name']); // removes backslashes
		$name = mysqli_real_escape_string($con,$name); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$phone = stripslashes($_REQUEST['phone']);
		$phone = mysqli_real_escape_string($con,$phone);
		$address = stripslashes($_REQUEST['address']);
		$address= mysqli_real_escape_string($con,$address);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
        $ip = stripslashes($_REQUEST['ip']);
		$ip = mysqli_real_escape_string($con,$ip);
		$mac = stripslashes($_REQUEST['mac']);
		$mac = mysqli_real_escape_string($con,$mac);
		$gateway= stripslashes($_REQUEST['gateway']);
		$gateway = mysqli_real_escape_string($con,$gateway);
		$pack= stripslashes($_REQUEST['pack']);
		$pack = mysqli_real_escape_string($con,$pack);
		$zone = stripslashes($_REQUEST['zone']);
		$zone = mysqli_real_escape_string($con,$zone);
		$trn_date = date("Y-m-d");
		
        $query = "INSERT into `user` (Name, password, Email, regdate,Phone,Address,serial,zone) VALUES ('$name', '$password', '$email', '$trn_date','$phone','$address','".md5($mac)."','$zone')";
		
        $result = mysqli_query($con,$query);
		
        if($result){
           echo "1st Stage Registration sucessful";
		  require('../db.php');
		   $querya = "INSERT into `cpauth` (ip, gateway, MAC, serial,rdate,ldate,pack,status) VALUES ('$ip', '$gateway', '$mac', '".md5($mac)."','$trn_date',' ','$pack','')";
		   $resulta = mysqli_query($con,$querya);
		   if($resulta){
           echo "<br>2nd Stage Registration sucessful";
		   echo "<br>Registration sucessful <b>Please use given Ip:$ip and gateway:$gateway and subnet to 255.255.255.0 or 255.255.255.128";
        }
		
        }
		
    }else{
		
		
?>

<center>
<h1>New user Registration</h1>

<form name="registration" action="" method="post">
<label>Name:<input type="text" name="name" placeholder="Full Name" required /></label><br>

<label>E-Mail:<input type="email" name="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required /></label><br>

<label>Phone:<input type="phone" name="phone" placeholder="Phone Number"  required /></label><br> <!--pattern="[7-9]{1}[0-9]{9}" -->

<label>Password:<input type="text" value="<?php  echo $pwdgen;?>" name="password" id="password" pattern=".{6,}" placeholder="Password" required /></label><br>

<label>Address:<textarea   name="address" placeholder="Address"  required > </textarea></label><br>
Select Pack:<select name="pack" required>
<?php
$qry = "SELECT * FROM pack";
        $resul = mysqli_query($con,$qry);
		if ($resul->num_rows > 0) {
			while($row = $resul->fetch_assoc()) {
				echo '<option value="'.$row['Name'].'" >'.$row['Name'].' Upload:'.$row['uspeed'].'mbps Download:'.$row['dspeed'].'mbps</option>';
			}
		}
		else{
			echo '<option  selected>ERROR</option>';
		}
?>
	<option  selected><b>Select A Service pack</b></option>
</select><br>

<br>
<label>IP:<input type="text" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" name="ip" placeholder="Ip"  required /></label>
<label>MAC:<input type="text" value="<?php 
$uip=$_SERVER['REMOTE_ADDR'];
$dlt=shell_exec('ping '.$uip.' -c 1');
$host=shell_exec('arp -a '.$uip.'');
 
preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $host, $matches);
$mac=$matches[0];     
echo $mac; ?>" name="mac" placeholder="Mac Adress"  required /></label>
<label>gateway:<input type="text" value="<?php echo $_SERVER['SERVER_ADDR'];?>" name="gateway" placeholder="Gateway"  required /></label><br>
<input type="hidden" name="zone" value="<?php session_start(); echo $_SESSION['zone'];?>"/>
<input type="submit" name="submit" value="Register" /> 
</form>

<br /><br />
</center>
<?php }
}
else
{
	
echo ('<center><a href="../bin/login.php">
<button class="btn span">Login</button></a>
<br><span style="font-size:32px;font-family: sans-serif;" color="red">ADMIN PANEL LOGIN REQUIRED</span></center></br>');

}

 ?>

	</div>
	
	
  
		
	 
	

</body>
</html>
