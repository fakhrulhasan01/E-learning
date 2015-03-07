<div class="o_container">
<?php
$tc = new Teacher();
$tc->Verification = $_GET['ver'];
$tc->SelectByVerification();
$tc->Id;
if($tc->Id != ""){
	$tc->Id;
	$_SESSION['tid'] = $tc->Id;
	$tc->Verification = '1';
	$tc->Update();
	Redirect("?t=welcome&ms=Your account verified successfully.");
}else{
	Redirect("?p=tclogin&log=Wrong verification code");
}
?>
</div>
</div>