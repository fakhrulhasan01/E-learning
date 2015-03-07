<div class="o_container">
<?php
$nt = new Notice();
if(isset($_POST['sub'])){
	$err = 0;
	$msg = "";
	$etitle = "";
	$edescription = "";
	$edate = "";
	
	if($_POST['title'] == ""){
		$err++;
		$etitle = "Please enter title.";
	}else if(strlen($_POST['title'])<3){
		$err++;
		$etitle = "Notice title must be at least 3 characters.";
	}
	if($_POST['desc'] == ""){
		$err++;
		$edescription = "Please enter notice description.";
	}else if(strlen($_POST['desc'])<8){
		$err++;
		$edescription = "Notice description must be at least 8 characters.";
	}
	if($_POST['date'] == ""){
		$err++;
		$edate = "Please enter date.";
	}
	if($err == 0){
	$nt->Id = $_POST['id'];
	$nt->SelectById();
	$des = "files/" . $nt->Description;
	unlink($des);


		$date1 = $_POST['date'];
		$date1 = date('Y-m-d', strtotime($date1));
		

	$nt->Name = $_POST['title'];
	$nt->Description = CreateFile($_POST['desc']);
	$nt->Ndate = $date1;
	if($nt->Update()){
		$msg .= "Changed successfully.";
	}else{
		$msg .= $nt->Err;
	}
	Redirect("?m=notice&ms={$msg}");
	
  }
}

$nt->Id = $_GET['id'];
$nt->SelectById();
?>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<table width="901">
  <tr>
    <td width="69">&nbsp;</td>
    <td width="111"><b>Name:</b></td>
    <td width="413"><input type="text" name="title" value="<?php echo $nt->Name; ?>"></td>
    <td width="288"><?php mer($etitle); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b>Description:</b></td>
    <td><textarea name="desc" style="width:400px; height:180px;"><?php FileRead("files/" . $nt->Description); ?></textarea></td>
    <td><?php mer($edescription); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b>Notice Date:</b></td>
    <td>	  		<input type="Text" name="date" readonly="readonly" id="demo1" maxlength="25" size="25" value="<?php echo $nt->Ndate; ?>"><a href="javascript:NewCal('demo1','ddmmmyyyy',true,24)"><img src="img/cal.gif" width="30" height="20" border="0" alt="Pick a date"></a>
	</td>
    <td><?php mer($edate); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Update"></td>
    <td></td>
  </tr>
</table>
</form>
</div>
</div>