
<br><br>
<?php
$uip=$_SERVER['REMOTE_ADDR'];

$ipAddress=$_SERVER['REMOTE_ADDR'];


if (isset($_GET['netac'])) {
     echo shell_exec('iptables -t nat -A POSTROUTING -s '.$uip.' -o ens18 -j MASQUERADE');
     echo shell_exec('iptables -t nat -D PREROUTING -s '.$uip.' -p tcp --dport  80 -j DNAT --to-destination 10.10.0.1:80');
     echo shell_exec('iptables -t nat -D PREROUTING -s '.$uip.' -p tcp --dport  443 -j DNAT --to-destination 10.10.0.1:443');
    
  echo $uip."Login Complete";
header("LOCATION: ./");
  }
 
  if (isset($_GET['netd'])) {
    echo shell_exec('iptables -t nat -D POSTROUTING -s '.$uip.' -o ens18 -j MASQUERADE');
    echo shell_exec('iptables -t nat -A PREROUTING -s '.$uip.' -p tcp --dport  80 -j DNAT --to-destination 10.10.0.1:80');
    echo shell_exec('iptables -t nat -A PREROUTING -s '.$uip.' -p tcp --dport  443 -j DNAT --to-destination 10.10.0.1:443');
    echo $uip."Logout Complete";
     header("LOCATION: ./");
  }
  
  
$dlt=shell_exec('ping '.$uip.' -c 1');
$host=shell_exec('arp -a '.$uip.'');
 
preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $host, $matches);
$mac=$matches[0];     
echo $mac;

$chkr=shell_exec('iptables -t nat --check POSTROUTING -s '.$uip.' -o ens18 -j MASQUERADE ; echo $?');
echo "<br>".$chkr."<br>";
{
if($chkr==0){
echo"<br>Already Logged in<br>";
}
else{
echo"<br>LogIn Required<br>
";
}
}
?>
<br><br>
<?php echo $uip;?>
<br>
<a href='index.php?netac=true'><button>GrantNetwork</button></a><br><br>
<a href='index.php?netd=true'><button>DisabletNetwork</button></a>
