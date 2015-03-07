<?php
if(isset($_POST['mlog'])){
	$mg = new Management();


	$mg->Email = $_POST['email'];
	$mg->Password = $_POST['password'];
	
	
	if($mg->Login()) {
		$_SESSION['id'] = $mg->Id;
		Redirect("?m=welcome");
	}else{
		Redirect("?p=home&ms=User Name or Password Error");
	}
}

if(isset($_POST['student_login'])){
	$st = new Student();
	
	$st->Email = $_POST['st_email'];
	$st->Password = $_POST['st_password'];
	if($st->Login()){
		$_SESSION['sid'] = $st->Id;
		Redirect("?s=welcome");
	}else{
		Redirect("?p=home&msgst=Email or password error.#con");
	}

}
	

if(isset($_POST['teacher_login'])){
	$tc = new Teacher();

	$tc->Email = $_POST['tc_email'];
	$tc->Password = $_POST['tc_password'];
	//$tc->SelectByStatus();
	if($tc->Login()){
		$_SESSION['tid'] = $tc->Id;
		Redirect("?t=welcome");
	}else{
		Redirect("?p=home&msgtc=Email or password error.#con");
	}
}
	
?>