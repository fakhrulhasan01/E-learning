<?php
	$dpt = new Department();
	$dpt->Id = $_GET['id'];
	if($dpt->Delete()) {
		$msg = "Delete Successful";	
	}else{
		$msg = $dpt->Err;	
	}
	Redirect("?m=department&ms={$msg}");
?>