<!doctype html>
<html>
<head>
  
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="shortcut icon" href="../bin/.images/favicon.ico">
   <title>ISP control</title>

   <link rel="stylesheet" href="./style.css">
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
   	<th>PackName</th>
	<th>PackPrice</th>
	<th>UploadSpeed</th>
	<th>DownloadSpeed</th>
	<th>Action</th>
  </tr>
  <?php
  include('db.php');

    // If form submitted, insert values into the database.
    if (isset($_REQUEST['name'])){
		$name = stripslashes($_REQUEST['name']); 
		$name = mysqli_real_escape_string($con,$name); 
		$price = stripslashes($_REQUEST['price']);
		$price = mysqli_real_escape_string($con,$price);
		$us = stripslashes($_REQUEST['us']);
		$us = mysqli_real_escape_string($con,$us);
		$ds = stripslashes($_REQUEST['ds']);
		$ds= mysqli_real_escape_string($con,$ds);
     	$sql="INSERT INTO `pack`(`Name`, `uspeed`, `dspeed`, `price`) VALUES ('$name','$us','$ds','$price')";
		$result = mysqli_query($con,$sql);
		if($result){
		header("LOCATION: ./");}
	}elseif(isset($_REQUEST["del"])){
		$dname=urldecode($_REQUEST["del"]);
		$sqla = "DELETE FROM `pack` WHERE `Name`='".$dname."'";
		if (mysqli_query($con, $sqla)) {
       header("LOCATION: ./");
          }else{echo "ERROR";}
	}elseif (isset($_REQUEST['ename'])){
		$ename = stripslashes($_REQUEST['ename']); 
		$ename = mysqli_real_escape_string($con,$ename); 
		$price = stripslashes($_REQUEST['eprice']);
		$price = mysqli_real_escape_string($con,$price);
		$us = stripslashes($_REQUEST['eus']);
		$us = mysqli_real_escape_string($con,$us);
		$ds = stripslashes($_REQUEST['eds']);
		$ds= mysqli_real_escape_string($con,$ds);
		$id = stripslashes($_REQUEST['id']);
		$id= mysqli_real_escape_string($con,$id);
     	$sqlc="UPDATE `pack` SET `Name`='$ename',`uspeed`='$us', `dspeed`='$ds', `price`='$price' WHERE `ID`='$id'";
		$resultc = mysqli_query($con,$sqlc);
		if($resultc){
		header("LOCATION: ./");}
		else{echo "ERROR in Update";}
	}elseif(isset($_REQUEST["edit"])){
		$ename=urldecode($_REQUEST["edit"]);
		$sqlb = "SELECT * FROM `pack` WHERE `Name`='".$ename."'";
		$result = mysqli_query($con,$sqlb) or die(mysql_error());
		$row = $result->fetch_assoc();
		echo '<form name="pack" action="" method="post">
<tr>
      <td><input type="text" class="tbi" name="ename" value="'.$row['Name'].'" placeholder="New Pack Name" required /></td>   
	  <td><input type="number" class="tbi" name="eprice" value="'.$row['price'].'" placeholder="New Pack Price" required /> Rs.</td>
      <td><input type="number" class="tbi" name="eus" value="'.$row['uspeed'].'" placeholder="Upload Speed" required /> Mbps</td>  
	  <td><input type="number" class="tbi" name="eds" value="'.$row['dspeed'].'" placeholder="Donwload Speed" required /> Mbps</td>
	  <input type="hidden" value="'.$row['ID'].'" name="id" />
	  <td><input type="submit" value="Update" class="tbib" name="update" required /></td>
</tr></form>';
	}
	else{
		echo '<form name="pack" action="" method="post">
<tr>
      <td><input type="text" class="tbi" name="name" placeholder="New Pack Name" required /></td>   <td><input type="number" class="tbi" name="price" placeholder="New Pack Price" required /> Rs.</td>
      <td><input type="number" class="tbi" name="us" placeholder="Upload Speed" required /> Mbps</td>   <td><input type="number" class="tbi" name="ds" placeholder="Donwload Speed" required /> Mbps</td>
	  <td><input type="submit" value="Add New" class="tbib" name="update" required /></td>
</tr></form>';		
	}
  ?>

<?php
require('db.php');
         $sqlx = "SELECT * FROM `pack`";
		$resultx = mysqli_query($con,$sqlx) or die(mysql_error());
		
if ($resultx->num_rows > 0 ) {
 
    while($row = $resultx->fetch_assoc() ) {
	echo "<tr>";
	echo "<td>".$row["Name"]."</td><td>".$row["price"]." Rs.</td><td>".$row["uspeed"]." mbps</td><td>".$row["dspeed"]." mbps</td><td><a href='./?del=".$row["Name"]."'><button>Delete</button></a>
	<a href='./?edit=".$row["Name"]."'><button>Edit</button></a></td>";
	echo "</tr>";
	}		
            }else{
				echo "<span>NO Service pack has been created please create a Service pack</span>";
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
