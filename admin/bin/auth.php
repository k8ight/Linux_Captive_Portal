<?php
session_start();
if(!isset($_SESSION["uname"])){
header("Location: login.php?msg=Require Login to Download");
exit(); }
?>
