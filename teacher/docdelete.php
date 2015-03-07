<?php
$msg = "";
$fl = new File();
$fl->Id = $_GET['id'];
$fl->SelectById();

$doc = "largefiles/" . $fl->File;
unlink($doc);
$fl->Id = $_GET['id'];
if($fl->Delete()){
	$msg .= "File Deleted";
}else{
	$fl->Err;
}
Redirect("?t=welcome&ms={$msg}");
?>