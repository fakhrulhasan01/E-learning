<div class="o_container">
<?php 
$vd = new Video();
$cs = new Course();
$ct = new CourseTeacher();


$etitle = "";
$ecourse = "";
$evideo = "";

if(isset($_POST['sub'])){
	$msg = "";
	$err = 0;
	$data = $_FILES['video'];
	if($_POST['vt'] == ""){
		$err++;
		$etitle = "Please enter video title.";
	}else if(strlen($_POST['vt'])<4){
		$err++;
		$etitle = "Video name must be at least 4 characters";
	}
	if($_POST['csid'] == 0){
		$err++;
		$ecourse = "Please select a course.";
	}
	if($data['name'] == ""){
		$err++;
		$evideo = "Please select video to upload.";
	}
	else if($data['size'] >= 1024*1024*26){
		$err++;
		$evideo = "Video size must be within 25 MB. You exceed limit.";
	}
	//echo $data['type'];
	

	if($_FILES['video']['name'] == ""){
		$err++;
		$evideo = "You entered a invalid video format or video size more than 25MB.";
	}
	
	//echo substr($data['name'], -4);
	echo $data['type'];
	//echo $err;
	if(($err == 0) && ( (substr($data['name'], -4) == ".MP4")
												||
						(substr($data['name'], -4) == ".mp4"))
														){
		
				$vd->Id = $_POST['id'];
				$vd->SelectById();
				
				if(($_FILES['video']['name'] != "") && ($_FILES['video']['type'] == "video/mp4")) {
					if($vd->Video != "")
					{
						$ppp = "video/" . $vd->Video;
						unlink($ppp);
					}
					$vd->Video = UploadVideoFile($_FILES['video']);
				}
				

		$vd->Title = $_POST['vt'];
		$vd->TeacherId = $_SESSION['tid'];
		$vd->CourseId = $_POST['csid'];
		
		if($vd->Update()){
			$msg .= "Video file changed successfully.";
		}else{
			$msg .= $vd->Err;
		}
		Redirect("?t=upvideo&msg={$msg}");
	}else{
		$evideo = "Video formate not acceptable.";
	}
	
}
	
$vd->Id = $_GET['id'];
$vd->SelectById();
?>
<br />
<br />

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="858">
  <tr>
    <td width="217">&nbsp;</td>
    <td colspan="3"><?php if(isset($_GET['msg'])){echo $_GET['msg']; }?></td>
  </tr>
  <tr>
    <td width="217">&nbsp;</td>
    <td width="92"><strong>Video Title</strong></td>
    <td width="234"><input type="text" name="vt" value="<?php echo $vd->Title; ?>" /></td>
    <td width="295"><?php mer($etitle); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Course</strong></td>
    <td>
    <select name="csid">
			<option value="0">Please Select One</option>
            <?php
			Selected($ct->Select(), $vd->CourseId);
            ?>
	</select>
    </td>
    <td><?php mer($ecourse); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Video</strong></td>
    <td>
	<video id="sampleMovie" src="video/<?php echo $vd->Video; ?>" style="width:400; height:220px" controls></video>    
    	<br />
		<input type="file" name="video" /></td>
    <td><?php mer($evideo); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Upload" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
<input type="hidden" name="vdate" value="<?php echo date("Y/m/d"); ?>" />
</form>


</div>
</div>