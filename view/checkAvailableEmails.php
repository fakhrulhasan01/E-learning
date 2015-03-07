<?php 
//
include_once("../DAL/DBConnect.php");
include_once("../controller/functions.php");
include_once("../DAL/dalTeacher.php");
include_once("../DAL/dalStudent.php");
//echo "Hi";
$tc = new Teacher();
$st = new Student();
if(isset($_POST['tcEmail'])){
	if($_POST['tcEmail'] != ""){
		$tc->Email = $_POST['tcEmail'];
		$r = $tc->Select();
		if($r != ""){
			echo "<span style='color:red'><b>".$_POST['tcEmail']."</b> is not available</span>";
		}else{
			echo "<span style='color:green'>Email is available</span>";
		}
	}
}

if(isset($_POST['stEmail'])){
	if($_POST['stEmail'] != ""){
		$st->Email = $_POST['stEmail'];
		$r = $st->Select();
		if($r != ""){
			echo "<span style='color:red'><b>".$_POST['stEmail']."</b> is not available</span>";
		}else{
			echo "<span style='color:green'>Email is available</span>";
		}
	}
}

?>