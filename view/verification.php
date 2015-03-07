<?php 
//echo $_GET['st'];
$msg = "";
$st = new Student();
$st->Verification = $_GET['ver'];
$st->SelectByVerification();
//echo $st->Email;
//echo $st->Status
$st->Id;
$st->SelectById();
$st->Verification = '1';
if($st->Update()){
	$_SESSION['sid'] = $st->Id;
	$msg .= "Your account verified successfully..";
	Redirect("?s=welcome&log={$msg}");
}
else{
	$msg .= "Wrong verification code";
	Redirect("?p=stdlogin&log={$msg}");
}
 
?>