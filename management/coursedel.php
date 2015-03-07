<?php
	$cs = new Course();
	$cs->Id = $_GET['id'];
	if($cs->Delete()) {
		$msg = "Delete Successful";	
	}else{
		$msg = "Some teachers may have taken this course.";
	}
	Redirect("?m=course&msg={$msg}");
?>