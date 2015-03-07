<?php
$nt = new Notice();
$nt->Id = $_GET['id'];
$nt->SelectById();
$des = "files/" . $nt->Description;
unlink($des);
if($nt->Delete()){
	$msg = "Successfully Deleted.";
}else{
	$msg = $nt->Err;
}
Redirect("?m=notice&msg={$msg}");
?>