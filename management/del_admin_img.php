<?php 
	$hm = new Homepage();
	$hm->Id = $_GET['id'];
	$hm->SelectById();
	$hm->Picture = "";
	if($hm->Update()){
		Redirect("?m=admininfo&ms=Image successfully deleted");
	}else{
		Redirect("?m=admininfo&ms=Failed");		
	}
?>