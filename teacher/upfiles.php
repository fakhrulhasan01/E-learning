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
		
		$fl->Name = $_POST['fn'];
		$fl->File = UploadDocFile($_FILES['file']);
		$fl->TeacherId = $_SESSION['tid'];
		$fl->CourseId = $_POST['csid'];
		$fl->Fdate = $_POST['date'];
		if($fl->Insert()){
			$msg .= "File posted successfully.";
		}else{
			$msg .= $fl->Err;
		}
	}
	
	Redirect("?t=upfiles&msg={$msg}");
	
}

?>
<br />
<br />


<form action="" method="post" enctype="multipart/form-data">
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
    <td><input type="text" name="fn" /></td>
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
				Select2($ct->Select());
            ?>
	</select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><b>Your File</b></td>
    <td><input type="file" name="file" /></td>
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



<div id="taable">
<table align="center" border="1">
<tr style="background-color:#999; color:#FFF;">
<th width="103">File Title</th>
<th width="111" height="29">File Name</th>
<th width="110">Course Name</th>
<th width="158">Uploaded By</th>
<th width="94">Edit</th>
<th width="94">Delete</th>
</tr>


<?php
$fl->TeacherId = $_SESSION['tid'];
$r = $fl->Select();
Table($r, "doc");
?>

</table>
</div>



</div>
</div>