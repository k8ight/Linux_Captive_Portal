    
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Status</title>
<meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="css/stat.css" />
</head>
<body>
<?php
	require('./bin/db.php');
	session_start();
	$uip=$_SERVER['REMOTE_ADDR'];
$dlt=shell_exec('ping '.$uip.' -c 1');
$host=shell_exec('arp -a '.$uip.'');
 
preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $host, $matches);
$mac=md5($matches[0]);     
if (isset($_GET['netac'])) {
	echo shell_exec('iptables -t nat -D POSTROUTING -s '.$uip.' -o ens18 -j MASQUERADE');
	 /*$sqlo = "UPDATE lanusers SET stat='' WHERE mac='$mac'";
		$resulto = mysqli_query($con,$sqlo) or die(mysql_error());*/
    
	
  }

	//Checking is user existing in the database or not
       $sql = "SELECT * FROM cpauth WHERE mac='$mac'";
		$result = mysqli_query($con,$sql) or die(mysql_error());
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
    $unamex=$row["username"];
		$_SESSION['ipx']=$row["ipa"];
		$macd=$row["mac"];
    	$fnamex=$row["fulname"];
		$adx=$row["address"];
   		$phx=$row["phone"];
		$emx=$row["email"];
		$stat=$row["stat"];
		$csdte=$row["csdte"];
		
            }	}	
			else{
				echo "<h3>Mac or ip Mismatch.</h3><br/>Click here to <a href='login.php'>Login</a>";
				}


      
	?>

<?php
echo "<div id='containerA1'>
<br><h1>IISPL Status</h1>
<h3>
Username:".$unamex."<br>
Fullname:".$fnamex."<br>	
Address:".$adx."<br>	
E-mail:".$emx."<br>
Reg Ip:".$_SESSION['ipx']."<br>
Reg MAC:".$macd."<br>
Internet Stat:".$stat."<br>
Internet validity:".$csdte."<br>";

$chkr=shell_exec('iptables -t nat --check POSTROUTING -s '.$uip.' -o ens18 -j MASQUERADE ; echo $?');


if($chkr==0&&$stat=="Active"){
 echo "<a href='status.php?netac=true'><button id='a'>Logout</button></a><br><br>";
}
else{
echo"Please Recharge /Re Login <a href='login.php'><button id='a'>Login</button></a>";
}
?>


</div>

</body>
</html>
