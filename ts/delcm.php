<?php
$sql = "select * from blog where id = '".$_GET['id']."'";
$sql = mysql_query($sql);
while($d = mysql_fetch_row($sql)){
	$f = $d[1];
}

if($f != ""){
	$df = "files/" . $f;
	unlink($df);
}





$sql = "delete from blog where id = '".$_GET['id']."'";

if(mysql_query($sql)){
	$msg = "delete successful.";
}else{
	$msg = mysql_error();
}
Redirect("?ts=blog&ms={$msg}");
?>