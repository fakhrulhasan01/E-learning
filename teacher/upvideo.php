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
	
	if(($err == 0) && ( (substr($data['name'], -4) == ".MP4")
												||
						(substr($data['name'], -4) == ".mp4"))												
																	){
		$vd->Title = $_POST['vt'];
		$vd->Video = UploadVideoFile($data);
		$vd->TeacherId = $_SESSION['tid'];
		$vd->CourseId = $_POST['csid'];
		$vd->Vdate = $_POST['vdate'];
		if($vd->Insert()){
			$msg .= "Video file uploaded successfully.";
		}else{
			$msg .= $vd->Err;
		}
		//Redirect("?t=upvideo&msg={$msg}");
	}else{
		$evideo = "Video formate not acceptable.";
	}
	
}
	

?>
<br />
<br />

<form action="" method="post" enctype="multipart/form-data">
<table width="858">
  <tr>
    <td width="217">&nbsp;</td>
    <td colspan="3"><?php if(isset($_GET['msg'])){mss($_GET['msg']); }?></td>
  </tr>
  <tr>
    <td width="217">&nbsp;</td>
    <td width="92"><strong>Video Title</strong></td>
    <td width="234"><input type="text" name="vt" /></td>
    <td width="295"><?php mer($etitle); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Course</strong></td>
    <td>
    <select name="csid">
			<option value="0">Please Select One</option>
            <?php
			Select($ct->Select());
            ?>
	</select>
    </td>
    <td><?php mer($ecourse); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Video</strong></td>
    <td><input type="file" name="video" /></td>
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

<table style="margin:40px 0px 0px 40px;">
<tr style="background-color:#999; color:#FFF;">
<th width="100" height="29">File Name</th>
<th width="39">Video</th>
<th width="121">Course Name</th>
<th width="111">Uploaded By</th>
<th width="111">Edit</th>
<th width="77">Delete File</th>
</tr>
<?php
$vd->TeacherId = $_SESSION['tid'];
$r = $vd->SelectForTeacher();
//Table($r, "video");
if($r != ""){
for($i=0; $i<count($r); $i++){
?>
<tr>
<td><?php echo $r[$i][1]; ?></td>
<td>
<video id="sampleMovie" src="video/<?php echo $r[$i][2]; ?>" style="width:400; height:220px" controls></video>
</td>

<td><?php echo $r[$i][3]; ?></td>
<td><?php echo $r[$i][4]; ?></td>
<td><a href="?t=videoedit&id=<?php echo $r[$i][0]; ?>">Edit</a></td>
<td><a href="?t=videodel&id=<?php echo $r[$i][0]; ?>">Delete</a></td>
</tr>
<?php 
}
}
?>
</table>

</div>
</div>