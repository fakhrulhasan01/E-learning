<?php
$bc = new BlogComment();
$bc->Id = $_GET['id'];
if($bc->Delete()){
	$msg = "Comment Successfully deleted.";
}else{
	$msg = $bc->Err;
}
Redirect("?ts=blog&msg={$msg}");
?>