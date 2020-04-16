
<?php
$con = mysqli_connect("localhost", "root", "", "captiveportal");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  
 
        
		 $sql = "SELECT * FROM `cpauth` ";
		 $result = mysqli_query($con,$sql) or die(mysql_error());
if ($result->num_rows > 0 ) {
 
    while($row = $result->fetch_assoc() ) {
	
		$stdate = date("Y-m-d");
		$sip=$row["ip"];
		 $sgty=$row["gateway"];
		 $smac=$row["MAC"];
		$sldate=$row["ldate"];
		$serial=$row["serial"];;
$date1=date_create($stdate);
$date2=date_create($sldate);
$diff=date_diff($date1,$date2);
$vlad= $diff->format("%R%a");
if($sldate > 0){
if($vlad < 0){
		echo $vlad;
		
	 $sqla = "UPDATE `cpauth` SET `status`='' WHERE `serial`='".$serial."'";
		 $resulta = mysqli_query($con,$sqla);
		 if($resulta){echo "DeActive_".$serial."<br>";}
		
	}
	else{
		if(!$row["status"]=="Active"){
		echo $vlad;
		$sasql = "UPDATE `cpauth` SET `status`='Active'  WHERE `cpauth`.`serial`='".$serial."'";
		 $resultb = mysqli_query($con,$sasql);
		 if($resultb){echo "Active_".$serial."<br>";}
		}}
}	
}}




else
{echo "<span>ERROR</span>";}



 ?>




