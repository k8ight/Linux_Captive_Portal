<?php
$con = mysqli_connect("localhost", "root", "", "captiveportal");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 
  
  
$sql = "SELECT * FROM `cpauth`";
$result = mysqli_query($con,$sql) or die(mysql_error());
if ($result->num_rows > 0 ) {
    while($row = $result->fetch_assoc() ) {
		$uip=$row['ip'];

     echo $uip;
			 if(!$row['status']==""){
		 echo"Active";
		 $chkr=shell_exec('iptables -t nat --check POSTROUTING -s '.$uip.' -o ens18 -j MASQUERADE ; echo $?');
		 if($chkr==0){echo "";}else{echo shell_exec('iptables -t nat -A POSTROUTING -s '.$uip.' -o ens18 -j MASQUERADE');}
		 
		 $chkra=shell_exec('iptables -t nat --check PREROUTING -s '.$uip.' -p tcp --dport 80 -j REDIRECT --to-port 80; echo $?');
		 if($chkra==0){echo shell_exec('iptables -t nat -D PREROUTING -s '.$uip.' -p tcp --dport 80 -j REDIRECT --to-port 80');}else{echo"";}
		 
		 $chkrb=shell_exec('iptables -t nat --check PREROUTING -s '.$uip.' -p tcp --dport 443 -j REDIRECT --to-port 443; echo $?');
		 if($chkrb==0){echo shell_exec('iptables -t nat -D PREROUTING -s '.$uip.' -p tcp --dport 443 -j REDIRECT --to-port 443');}else{echo"";}
	 }
	 else{
		 echo "Deactive";
		 $chkr=shell_exec('iptables -t nat --check POSTROUTING -s '.$uip.' -o ens18 -j MASQUERADE ; echo $?');
		 if($chkr==0){echo shell_exec('iptables -t nat -D POSTROUTING -s '.$uip.' -o ens18 -j MASQUERADE');}else{echo"";}
		 
		  $chkra=shell_exec('iptables -t nat --check PREROUTING -s '.$uip.' -p tcp --dport 80 -j REDIRECT --to-port 80; echo $?');
		 if($chkra==0){echo "";}else{echo  shell_exec('iptables -t nat -A PREROUTING -s '.$uip.' -p tcp --dport 80 -j REDIRECT --to-port 80');}
		 
		 $chkrb=shell_exec('iptables -t nat --check PREROUTING -s '.$uip.' -p tcp --dport 443 -j REDIRECT --to-port 443; echo $?');
		 if($chkrb==0){echo "";}else{echo shell_exec('iptables -t nat -A PREROUTING -s '.$uip.' -p tcp --dport 443 -j REDIRECT --to-port 443');}
		 
		 }

	}
}


?>

