<style>#a
{
	position:absolute;
	left:20%;
	padding: 10px 25px 8px; 
	color: #fff; background-color: green; 
	text-shadow: rgba(0,0,0,0.24) 0 1px 0; 
	font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0;
	border: 1px solid green; border-radius: 2px; margin-top: 10px; cursor:pointer;}
</style>
<?php
include("auth.php");
if(isset($_REQUEST["dl"])){
	header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
$file = urldecode($_REQUEST["dl"]);
/*Echo("<h2><p>You have Requested to download-$file from LINUX_AMD SECURE SERVER ");

echo("<br>$>CERT_TO_ROOT_LOADED");

echo("<br>$>File_FROM_ROOT Access_Granted,TRANSFERING_TO_CACHE....</p></h2>");

echo("<a href='../$file'><button id='a'>Download</button>");*/
header ("location: ../$file.iso");
	flush();
	exit;
}
?>