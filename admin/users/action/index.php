<!doctype html>
<html>
<head>
  
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="shortcut icon" href="../bin/.images/favicon.ico">
   <title>ISP control</title>

   <link rel="stylesheet" href="../../css/style.css">
   <link rel="stylesheet" href="../../css/mobile.css">

   

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
<a href="../../register"><button class="btn span">Add NewUser</button></a>
<a href="../../users"><button class="btn span">Portal Users</button></a>
<a href="../../"><button class="btn span">System & Networking</button></a>
<a href="../../ddns"><button class="btn span" >DHCP&DNS</button></a>
<a href="../../bin/logout.php"><button class="btn span">Logout</button></a>
</center></br>');


?>
<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	


<div id='container1'>

<?php
$ci = urldecode($_REQUEST["clientid"]); 

require('../../db.php');
         $sql = "SELECT * FROM `user` WHERE `serial`='$ci'";
		$result = mysqli_query($con,$sql) or die(mysql_error());
		 $sqla = "SELECT * FROM `cpauth` WHERE `serial`='$ci'";
		 $resulta = mysqli_query($con,$sqla) or die(mysql_error());
if ($result->num_rows > 0 ) {
 
    while($row = $result->fetch_assoc() ) {
		$rowa = $resulta->fetch_assoc();
   		$sname=$row["Name"];
		 $smail=$row["Email"];
	     $spwd=$row["password"];
		 $saddr=$row["Address"];
		 $sph=$row["Phone"];
		 $sip=$rowa["ip"];
		 $sgty=$rowa["gateway"];
		 $smac=$rowa["MAC"];
		 $szone=$row["zone"];
		 $spack=$rowa["pack"];
		 $sregdate=$row["regdate"];
		 $sstat=$rowa["status"];
		 
		 

$stdate = date("Y-m-d");
$sldate=$rowa["ldate"];
$datea=date_create($stdate);
$dateb=date_create($sldate);
$diff=date_diff($datea,$dateb);
$vlx= $diff->format("%R%a");



if($vlx < 0){
	$vl='<option value="30" >30 Days or 1 month</option>
<option value="180">180 Days or 6 month</option>
<option value="365">365 Days or 1 year</option>
<option selected>Select A Recharge Plan Duration</option>';
	
	}else
	{
		$vvlx = @end((explode('+', $vlx, 2)));
		$vl='<option value="'.$vvlx.'" selected>'.$vlx.' Days left</option>
			<option value="30" >30 Days or 1 month</option>
<option value="180">180 Days or 6 month</option>
<option value="365">365 Days or 1 year</option>';}
				
		
		echo "<center>ClientID:<b>".$row["serial"]."</b></center>";
	
		
	
	}  }else{
				echo "<span>NO DATA to SHOW</span>";
				}
        


 ?>




<?php
 $pwdgen = mt_rand(100000,999999); 
include('../../db.php');

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
     	$mac = stripslashes($_REQUEST['mac']);
		$mac = mysqli_real_escape_string($con,$mac);
		$rday = stripslashes($_REQUEST['rday']);
		$rday = mysqli_real_escape_string($con,$rday);
		$pack= stripslashes($_REQUEST['pack']);
		$pack = mysqli_real_escape_string($con,$pack);
		$ci=stripslashes($ci);
		$ci=mysqli_real_escape_string($con,$ci);
		$PD="P".$rday."D";
		$tdate = date("Y-m-d");
		$date = new DateTime($tdate); // Y-m-d
$date->add(new DateInterval($PD));
$ldate=$date->format('Y-m-d');

        $query = "UPDATE `user` SET `Name`='$name', `password`='$password', `Email`='$email', `Phone`='$phone',`Address`='$address' WHERE `user`.`serial` = '".$ci."'";
        $result = mysqli_query($con,$query);
		
        if($result){
         echo "Update in 1st stage done!";
		 $querya = "UPDATE `cpauth` SET `MAC`='$mac',`status`='$cst',`pack`='$pack',`rdate`='$tdate',`ldate`='$ldate'  WHERE `cpauth`.`serial`='".$ci."'";
	    $resulta = mysqli_query($con,$querya);
		if($resulta){
         echo "Update in 2nd stage done!";
        }
        }
		 header("LOCATION: ../");
    }else{
		
		
?>

<center>
<h1>Modify Registration</h1>

<form name="registration" action="" method="post">
<label>Name:<input type="text" name="name" value="<?php echo $sname;?>" placeholder="Full Name" required /></label>

<label>E-Mail:<input type="email" name="email" value="<?php echo $smail;?>" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required /></label><br>

<label>Phone:<input type="phone" name="phone"  value="<?php echo $sph;?>"  placeholder="Phone Number"  required /></label> <!--pattern="[7-9]{1}[0-9]{9}" -->

<label>Password:<input type="text" value="<?php echo $spwd;?>" name="password" id="password" pattern=".{6,}" placeholder="Password" required /></label><br>

<?php echo '<label>Address:<textarea name="address" placeholder="Address" required >'.$saddr.'</textarea></label>';?>
Select Pack:<select name="pack" required>
<?php
$qry = "SELECT * FROM pack";
        $resul = mysqli_query($con,$qry);
		if ($resul->num_rows > 0) {
			while($row = $resul->fetch_assoc()) {
				if($spack==$row['Name']){$std="selected";}else{$std="";}
				echo '<option value="'.$row['Name'].'" '.$std.'>'.$row['Name'].' Upload:'.$row['uspeed'].'mbps Download:'.$row['dspeed'].'mbps</option>';
			}
		}
		else{
			echo '<option  selected>ERROR</option>';
		}
?>
	
</select><br>

<br>
<label>IP:<input type="text" value="<?php echo $sip;?>" name="ip" placeholder="Ip"  required disabled  /></label>
<label>MAC:<input type="text" value="<?php echo $smac;?>" name="mac" placeholder="Mac Adress"  required /></label>
<label>gateway:<input type="text" value="<?php echo $sgty;?>" name="gateway" placeholder="Gateway" disabled   required /></label><br>
<input type="hidden" name="zone" value="<?php echo $szone;?>"/>
<label>Zone:<input type="text" name="zone" value="<?php echo $szone;?>" disabled /></label>
<label>Registerd on:<input type="text" name="zone" value="<?php echo $sregdate;?>" disabled /></label><br>
<label>Last Rechagre on:<input type="text" name="zone" value="<?php echo $srdate." Finishes on ".$sldate;?>" disabled /></label>
Recharge For:Selected Pack:<select name="rday" required> 
<?php echo $vl;?>
</select><br>
<input type="submit" name="submit" value="Update" /> <a href="../"><button id="a">Cancel</button></a>
</form><br>

<br /><br />
</center>
<?php }
}
else
{
	
echo ('<center><a href="../../bin/login.php">
<button class="btn span">Login</button></a>
<br><span style="font-size:32px;font-family: sans-serif;" color="red">ADMIN PANEL LOGIN REQUIRED</span></center></br>');

}

 ?>

	</div>
	
	
  
		
	 
	

</body>
</html>
