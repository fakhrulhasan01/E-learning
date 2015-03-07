<?php
	$ac = new AcademicQualification();
	$ac->StudentId = $_SESSION['sid'];
	$ac->ExamTitleId = $_GET['id'];
	if($ac->Delete()) {
		$msg = "Delete Successful";	
	}else{
		$msg = $ac->Err;	
	}
	Redirect("?s=add_a_qualification&msg={$msg}");
?>