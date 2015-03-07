<?php session_start();


	require_once('DAL/DBConnect.php');
	require_once('DAL/dalAnswer.php');
	require_once('DAL/dalBlog.php');
	require_once('DAL/dalCourse.php');
	require_once('DAL/dalCoursequalification.php');
	require_once('DAL/dalDepartment.php');
	require_once('DAL/dalDesignation.php');
	require_once('DAL/dalExamtitle.php');
	require_once("DAL/dalAcademicqualification.php");
	require_once('DAL/dalManagement.php');
	require_once('DAL/dalQuestion.php');
	require_once('DAL/dalStudent.php');
	require_once('DAL/dalTeacher.php');
	require_once('DAL/dalCourseteacher.php');
	require_once('DAL/dalNotice.php');
	require_once('DAL/dalSlideshow.php');
	require_once('DAL/dalFile.php');
	require_once('DAL/dalHomepage.php');
	require_once('DAL/dalVideo.php');
	require_once('DAL/dalBlogcomment.php');
	
	require_once("functions.php");
	
	$not = new Notice();
	$not->Ndate = 360;
	$not->SelectForDelete();
	$rr = $not->SelectForDelete();
	if($rr != ""){
	for($i=0; $i<count($rr); $i++){
			if(substr($rr[$i][2], -4) == ".txt"){
				$tfile = "files/" . $rr[$i][2];
				unlink($tfile);
			}else{
				$dfile = "largefiles/" . $rr[$i][2];
				unlink($dfile);
			}
		}
	}
	$not->AutoDeleteNotice();
	
	
	
	$fl = new File();
	$fl->SelectForDelete();
	$rr = $fl->SelectForDelete();
	if($rr != ""){
	for($i=0; $i<count($rr); $i++){
		$delfile = "largefiles/" . $rr[$i][2];
		unlink($delfile);
		}
	}
	$fl->AutoDeleteFile();
	
	
	
	$vd = new Video();
	$vd->SelectForDelete();
	$rr = $vd->SelectForDelete();
	if($rr != ""){
	for($i=0; $i<count($rr); $i++){
		$delfile = "video/" . $rr[$i][2];
		unlink($delfile);
		}
	}
	$vd->AutoDeleteVideo();
	
	
	
	if(isset($_SESSION['id'])){
		$mg = new Management();
		$mg->Id = $_SESSION['id'];
		$mg->SelectById();
	}

	if(isset($_SESSION['tid'])){
		$tc = new Teacher();
		$tc->Id = $_SESSION['tid'];
		$tc->SelectById();
	}



	if(isset($_SESSION['sid'])){
		$st = new Student();
		$st->Id = $_SESSION['sid'];
		$st->SelectById();
	}



?>