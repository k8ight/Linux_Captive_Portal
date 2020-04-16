<form action="" name="ping" method="POST">
<input type="text" id="a"  value="<?php echo $_SERVER['REMOTE_ADDR'];?>" placeholder="Ip or Host name" name="url" required />
<input type="number" id="a"  value="4" placeholder="Ip or Host name" min="4" name="hop" />
<input type="submit" value="PING"/>
</form>

<?php
if(isset($_REQUEST["url"])){
$ip =stripslashes($_REQUEST['url']);
$max=stripslashes($_REQUEST['hop']);
for($i = 1; $i<=$max; $i++) {
    exec("ping -c 1 $ip", $output);
    echo  $output[1].$output[4]."<br>";
}
}

?>


