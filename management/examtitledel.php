<?php
	$et = new ExamTitle();
	$et->Id = $_GET['id'];
	if($et->Delete()) {
		$msg = "Delete Successful";	
	}else{
		$msg = $et->Err;	
	}
	Redirect("?m=examtitle&ms={$msg}");
?>