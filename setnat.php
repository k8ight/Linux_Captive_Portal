<html>
<?php
  function runMyFunction() {
  $db=shell_exec('cat /proc/sys/net/ipv4/ip_forward');

if($db='1'){
echo "Nat forward enabled";
}
else{
echo 'Nat forward Not enabled <br> run terminal and add echo "1" >/proc/sys/net/ipv4/ip_forward';
}

  }

  if (isset($_GET['NAT'])) {
    runMyFunction();
  }
?>
<br>

<a href='setnat.php?NAT=true'><button>CheckNATipv4</button></a>
<br>
</html>
