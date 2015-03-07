<?php
	$dg = new Designation();
	$dg->Id = $_GET['id'];
	if($dg->Delete()) {
		$msg = "Delete Successful";	
	}else{
		$msg = $dg->Err;	
	}
	Redirect("?m=designation&ms={$msg}");
?>