<?php
$nt = new Notice();
$msg = "";
$nt->Id = $_GET['id'];
$nt->SelectById();
$des = "largefiles/" . $nt->Description;
unlink($des);
if($nt->Delete()){
	$msg = "File deleted successfully.";
}else{
	$msg = $nt->Err;
}
Redirect("?m=noticefile&msg={$msg}");
?>