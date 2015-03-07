<?php
$qs = new Question();
$qs->Id = $_GET['id'];
$qs->SelectById();
$qq = $qs->Question;
unlink("files/" . $qq);
if($qs->Delete()){
	$msg .= "Question Deleted.";
}else{
	$msg .= $qs->Err;
}
Redirect("?t=postquestion&ms={$msg}");
?>