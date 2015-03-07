<div class="o_container">
<style type="text/css">
td{
	padding:6px;
	text-align:center;
}
</style>
<?php 
$nt = new Notice();
	$etitle = "";
	$efile = "";

if(isset($_POST['sub'])){
	$msg = "";
	$err = 0;
	$edescription = "";
	$edate = "";
	
	
	

	if($_POST['tl'] == ""){
		$err++;
		$etitle .= "Please enter file name<br />";
	}
	else if(strlen($_POST['tl'])<3){
		$err++;
		$edescription .= "{$err}. File name must be at least 3 characters<br />";
	}
	if($_FILES['file']['name'] == ""){
		$err++;
		$efile = "{$err}. Please select file to upload.";
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
		
		
		$date = $_POST['date'];
		$nt->Name = $_POST['tl'];
		$nt->Description = UploadDocFile($_FILES['file']);
		$nt->Ndate = $date;
		if($nt->Insert()){
			$msg .= "File Posted";
		}else{
			$msg .= $nt->Err;
		}
	Redirect("?m=noticefile&ms={$msg}");
	}else{
		$efile = "File formate not supported.";
	}
	
	
}

?>
<br />
<br />


<form action="" method="post" enctype="multipart/form-data">
<table width="906">
  <tr>
    <td width="236">&nbsp;</td>
    <td width="96"><b>File</b></td>
    <td width="260"><input type="text" name="tl" /></td>
    <td width="294"><?php mer($etitle); ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><b>Your File</b></td>
    <td><input type="file" name="file" /></td>
    <td><?php mer($efile); ?></td>
  </tr>
	<input type="hidden" name="date"  value="<?php echo date("Y/m/d"); ?>" />
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Upload" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>


<table style="margin:40px 0px 0px 240px;" border="1">
<tr style="background-color:#999; color:#FFF;">
<th width="100" height="29">File Name</th>
<th width="121">Download File/Files</th>
<th width="117">Upload Date</th>
<th width="92">Change Title</th>
<th width="92">Delete</th>
</tr>


<?php
$r = $nt->Select();
			for($i=0; $i<count($r); $i++){
			if((substr($r[$i][2], -4) == ".doc") || (substr($r[$i][2], -4) == "docx")
						||(substr($r[$i][2], -4) == ".pdf") || (substr($r[$i][2], -4) == ".ppt") || (substr($r[$i][2], -4) == "pptx"))
					{
		echo "<tr>";
		echo "<td>{$r[$i][1]}</td>";
		echo "<td>{$r[$i][2]}</td>";
		echo "<td>{$r[$i][3]}</td>";
		echo "<td><a href='?m=noticefileedit&id={$r[$i][0]}'>Change title</a></td>";
		echo "<td><a href='?m=noticefiledel&id={$r[$i][0]}'>Delete</a></td>";
		echo "</tr>";
	}
}

?>

</table>

</div>
</div>