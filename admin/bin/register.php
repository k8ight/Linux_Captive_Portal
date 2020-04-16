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
	<center><br><span id="log"><b><u>ISP Admin</u></b></span>
<a href="../"><button class="btn span" >Back</button></a>

<center>
	
<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	


<div id='container1'>
<?php
 $pwdgen = mt_rand(100000,999999); 
require('db.php');


    // If form submitted, insert values into the database.
    if (isset($_REQUEST['zone'])){
		
		$zone = stripslashes($_REQUEST['zone']);
		$zone = mysqli_real_escape_string($con,$zone); 
		$fname = stripslashes($_REQUEST['fname']);
		$fname = mysqli_real_escape_string($con,$fname); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$phone = stripslashes($_REQUEST['phone']);
		$phone = mysqli_real_escape_string($con,$phone);
		$address = stripslashes($_REQUEST['address']);
		$address= mysqli_real_escape_string($con,$address);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
		
        $ipb = stripslashes($_REQUEST['ipb']);
		$ipb = mysqli_real_escape_string($con,$ipb);
		$ipr = stripslashes($_REQUEST['ipr']);
		$ipr = mysqli_real_escape_string($con,$ipr);
		$gname= stripslashes($_REQUEST['gname']);
		$gname = mysqli_real_escape_string($con,$gname);
		$uname=$zone.'_'.$gname;
		
		
        $query = "INSERT into `padmin` (`username`, `fname`, `password`, `gname`, `phone`, `email`, `address`, `zone`, `ipblocks`, `routerip`) VALUES ('$uname','$fname' ,'".md5($password)."', '$gname', '$phone','$email','$address','$zone','$ipb','$ipr')";
		
        $result = mysqli_query($con,$query) or die(mysql_error());
		
        if($result){
           header("LOCATION: ../");
		   
        }
		else{
		echo "error";	
		}
		
        
		
    }else{
		
		
?>

<center>
<h1>Portal Admin Registration</h1>

<form name="registration" action="" method="post">
<label>Zone Name:<input type="text" name="zone" placeholder="username" required /></label><br>
<label>full name:<input type="text" name="fname" placeholder="Contact personal  name" required /></label><br>
<label>E-Mail:<input type="email" name="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required /></label><br>

<label>Phone:<input type="phone" name="phone" placeholder="Phone Number"  required /></label><br> <!--pattern="[7-9]{1}[0-9]{9}" -->

<label>Password:<input type="text"  name="password" id="password" pattern=".{6,}" placeholder="Password" required /></label><br>

<label>Address:<textarea   name="address" placeholder="Address"  required > </textarea></label><br>
Select Group:<select name="gname" required>
<?php
$qry = "SELECT * FROM agroup";
        $resul = mysqli_query($con,$qry);
		if ($resul->num_rows > 0) {
		
			while($row = $resul->fetch_assoc()) {
				if($row['gname']=="Admin"){$slt="selected";}else{$slt="";}
				echo '<option value="'.$row['gname'].'" >'.$row['gname'].'</option>';
			}
		}
		else{
			echo '<option  selected>ERROR</option>';
		}
?>
	
</select><br>
<label>Ip block:<input type="text" value="255.255.255.0"  name="ipb" placeholder="Ipblocks"  required > </textarea></label><br>
<label>RouterIps:<textarea  value=""  name="ipr" placeholder="router Ips"  required ><?php echo gethostbyname('localhost');?>

</textarea><h5>//setting router ips here are for accounting purposes . to add ips use networktab</h5></label><br>
<br>


<input type="submit" name="submit" value="Register" /> 
</form>

<br /><br />
</center>
<?php } ?>

	</div>
	
	
  
		
	 
	

</body>
</html>
