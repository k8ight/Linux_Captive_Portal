<?php 
session_start();

$uip=$_SERVER['REMOTE_ADDR'];
$dlt=shell_exec('ping '.$uip.' -c 1');
$host=shell_exec('arp -a '.$uip.'');
 
preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $host, $matches);
$mac=$matches[0]; 
require('db.php');
    
?>
<!doctype html>
<html>
<head>
  
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="shortcut icon" href="./bin/.images/favicon.ico">
   <title>!!ATTENTION!!</title>

   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/mobile.css">

   

</head>
<body link="black" vlink="black" >
<center>
<div id="container">
	<br><span id="log"><b><u>Service Status</u></b></span><br>
	 <?php
	 $sql = "SELECT * FROM `cpauth` WHERE `ip`='$uip' AND `MAC`='$mac'";
$result = mysqli_query($con,$sql);
if ($result->num_rows > 0 ) {
    while($row = $result->fetch_assoc() ) {
		$sqla = "SELECT * FROM `user` WHERE `serial`='".$row['serial']."'";
		 $resulta = mysqli_query($con,$sqla) or die(mysql_error());
		$rowa = $resulta->fetch_assoc();
		$stdate = date("Y-m-d");
		$sldate=$row["ldate"];
$date1=date_create($stdate);
$date2=date_create($sldate);
$diff=date_diff($date1,$date2);
$vlad= $diff->format("%a");

		if($row["status"]=="Active"){ $st="<div style='color:green;'>Active <br>Validity Still:".$row["ldate"]."<br>".$vlad."Days left.</div>";}elseif($row["ldate"]==""){$st="<div style='color:orange;'>Service Not Started yet!!<br></div>";}else{$st="<div style='color:red;'>Service Terminated on:-<br>".$row["ldate"]."</div>";}
		echo "<br><b><h3>".$st."</h3></b>";
		
		
		echo"<div id='btfl'>";
		echo "<b><br>Name:".$rowa['Name'];
		echo "<br>Address:".$rowa['Address'];
		echo "<br>phone:".$rowa['Phone'];
		echo "<br>E-Mail:".$rowa['Email'];
		echo "<br>IP:".$row['ip'];
		echo "<br>MAC:".$row['MAC'];
		echo "<br>Zone:".$rowa['zone'];
		echo "<br>Pack:".$row['pack'];
		echo "</div>";
		echo "<br>ClientID:<br>".$row['serial'];
		
	}
}else {echo "Not Registerd yet";}
	 
	 ?></b>
	<br><a href="./sd"><button class="btn span">Self Diagnostic</button></a>

	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5>

	</div>
</center>
</body>
</html>
