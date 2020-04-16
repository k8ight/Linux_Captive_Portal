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
<table>
  <tr>
    <th>Status</th>
	<th>Validity</th>
	<th>Action</th>
    <th>Name</th>
	<th>password</th>
    <th>serial/Client ID</th>
    <th>Address</th>
	<th>phone</th>
	<th>email</th>
	<th>RegDate</th>
	<th>zone</th>
	<th>ip/gateway mac</th>
	<th>Last Recharge</th>
	<th>Recharge Still</th>
	<th>pack</th>
  </tr>


<?php
require('db.php');
         $sql = "SELECT * FROM `user`";
		$result = mysqli_query($con,$sql) or die(mysql_error());
		 $sqla = "SELECT * FROM `cpauth`";
		 $resulta = mysqli_query($con,$sqla) or die(mysql_error());
if ($result->num_rows > 0 ) {
 
    while($row = $result->fetch_assoc() ) {
		$rowa = $resulta->fetch_assoc();
			$action="<a href='./action/?clientid=".$row["serial"]."'><button>Edit/Recharge</button></a>";
         	echo "<tr>";
		$srdate=$rowa["rdate"];
		$stdate = date("Y-m-d");
		$sldate=$rowa["ldate"];
$date1=date_create($stdate);
$date2=date_create($sldate);
$diff=date_diff($date1,$date2);
$vlad= $diff->format("%R%a");


if($vlad < 0){$valid="<div style='color:red;'>$vlad Days ago</div>";}else{$valid="<div style='color:green;'>$vlad Days left</div>";}
     if($rowa["status"]=="Active"){ $st="<div style='color:green;'>Active</div>";	}else{$st=$st="<div style='color:red;'>Not Active</div>";}
	 
		echo "<td>$st</td><td>$valid</td><td>$action</td><td>".$row["Name"]."</td><td>".$row["password"]."</td>
		<td>".$row["serial"]."</td><td>".$row["Address"]."</td>
		<td>".$row["Phone"]."</td><td>".$row["Email"]."</td>
		<td>".$row["regdate"]."</td><td>".$row["zone"]."</td><td>".$rowa["ip"]."/".$rowa["gateway"]." ".$rowa["MAC"]."</td>
		<td>".$rowa["rdate"]."</td><td>".$rowa["ldate"]."</td><td>".$rowa["pack"]."</td>";
		echo "</tr>";
	
	}		
            }else{
				echo "<span>NO DATA to SHOW</span>";
				}
        
}
else
{
	
echo ('<center><a href="../bin/login.php">
<button class="btn span">Login</button></a>
<br><span style="font-size:32px;font-family: sans-serif;" color="red">ADMIN PANEL LOGIN REQUIRED</span></center></br>');

}

 ?>
</table>
	</div>
	
	
  
		
	 
	

</body>
</html>
