<?php
$ip ="192.168.0.1";
$max="104";
for($i = 1; $i<=$max; $i++) {
    exec("ping -n 1 $ip", $output);
    echo  $output[1].$output[5]."<br>";
}

?>