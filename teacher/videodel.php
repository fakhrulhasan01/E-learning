<?php
$vd = new Video();
$vd->Id = $_GET['id'];
$vd->SelectById();
if($vd->Video != ""){
	$vddel = "video/" . $vd->Video;
	unlink($vddel);
}
if($vd->Delete()){
	$msg = "Video deleted successfully.";
}else{
	$msg = mysql_error();
}
Redirect("?t=upvideo&msg={$msg}");
?>