<?php
	$ct = new CourseTeacher();
	$ct->TeacherId = $_SESSION['tid'];
	$ct->CourseId = $_GET['id'];
	if($ct->Delete()) {
		$msg = "Delete Successful";	
	}else{
		$msg = $ct->Err;	
	}
	Redirect("?t=courses&ms={$msg}");
?>