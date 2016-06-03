<?php
if(isset($_GET["archivo"])){
	header ("Content-Disposition: attachment; filename=".$_GET["name"]."\n\n");
	header ("Content-Type: application/octet-stream");
	readfile($_GET["name"]);
	  unlink($_GET["name"]);
}else{
	header ("Content-Disposition: attachment; filename=".$_GET["name"]."\n\n");
	header ("Content-Type: application/pdf");
	readfile($_GET["name"]);
	  unlink($_GET["name"]);
}
?>