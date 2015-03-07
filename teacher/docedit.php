<div class="o_container">
<style type="text/css">
td{
	padding:6px;
}

#taable th{
	border:1px #F5F5F5 solid;
}
#taable tr{
	border:1px #F5F5F5 solid;
}
#taable td{
	border:1px #F5F5F5 solid;
}
#taable table{
	border:1px #F5F5F5 solid;
}
</style>
<?php 
$fl = new File();
$cs = new Course();
$ct = new CourseTeacher();

if(isset($_POST['sub'])){
	$msg = "";
	$err = 0;
	$data = $_FILES['file'];
	if($_POST['fn'] == ""){
		$err++;
		$msg .= "{$err}. Please enter file name<br />";
	}
	else if(strlen($_POST['fn'])<3){
		$err++;
		$msg .= "{$err}. File name must be at least 3 characters<br />";
	}
	if($_POST['csid'] == 0){
		$err++;
		$msg .= "{$err}. Please select One Course.<br />";
	}
	
	if(($err == 0) && ( (substr($_FILES['file']['name'], -4) == ".doc")
												||
						(substr($_FILES['file']['name'], -4) == "docx")												
												||
						(substr($_FILES['file']['name'], -4) == ".ppt")
												||
						(substr($_FILES['file']['name'], -4) == "pptx")
												||
						(substr($_FILES['file']['name'], -4) == ".pdf"))												
												){



				$fl->Id = $_POST['id'];
				$fl->SelectById();
				
				if(($data['name'] != "") && (($data['type'] == "application/msword")
											||
				($data['type']  ==	"application/vnd.openxmlformats-officedocument.wordprocessingml.document")
											||
				($data['type']  ==	"application/octet-stream")
											||
				($data['type'] == "application/pdf")
											||
				($data['type'] == "application/vnd.ms-powerpoint")
											||
				($data['type'] == "application/vnd.openxmlformats-officedocument.presentationml.presentation")				
				)) {
					if($fl->File != "")
					{
						$ppp = "largefiles/" . $fl->File;
						unlink($ppp);
					}
					$fl->File = UploadDocFile($data);
				}
				

		
		$fl->Name = $_POST['fn'];
		$fl->TeacherId = $_SESSION['tid'];
		$fl->CourseId = $_POST['csid'];
		if($fl->Update()){
			$msg .= "File updated successfully.";
			Redirect("?t=upfiles&msg={$msg}");	
		}else{
			$msg .= $fl->Err;
		}
	}
	
	
}

$fl->Id = $_GET['id'];
$fl->SelectById();
?>
<br />
<br />


<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<table width="600">
  <tr>
    <td></td>
    <td></td>
    <td colspan="2">
	<?php
    	if(isset($_GET['msg'])){
			mss($_GET['msg']);
		}
	?>
    </td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><b>Lecture/File Name</b></td>
    <td><input type="text" name="fn" value="<?php echo $fl->Name; ?>" /></td>
   </tr>
  
	<tr>
    <td width="145">&nbsp;</td>
    <td width="216">&nbsp;</td>
    <td width="93"><b>Posted On: </b></td>
    <td width="126">
    <select name="csid">
			<option value="0">Please Select One</option>
            <?php
			$ct->TeacherId = $_SESSION['tid'];
			Selected2($ct->Select(), $fl->CourseId);
            ?>
	</select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><b>Your File</b></td>
    <td><input type="file" name="file" /><a href="largefiles/<?php echo $fl->File; ?>"><?php echo $fl->File; ?></a></td>
  </tr>
  <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>" />
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Upload" /></td>
  </tr>
</table>
</form>



</div>



</div>
</div>