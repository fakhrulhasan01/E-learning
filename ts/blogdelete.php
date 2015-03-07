<?php
$b = new Blog();
$b->Id = $_GET['id'];
if($b->Delete()){
	$msg = "Successfully deleted.";
}else{
	$msg = $b->Err;
}
Redirect("?ts=blog&msg={$msg}");
?>