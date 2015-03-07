<div class="o_container">
<?php
$nt = new Notice();
	$err = 0;
	$msg = "";
	$etitle = "";
	$edescription = "";
	$edate = "";
if(isset($_POST['sub'])){

	
	if($_POST['title'] == ""){
		$err++;
		$etitle = "Please enter title.";
	}else if(strlen($_POST['title'])<3){
		$err++;
		$etitle = "Notice title must be at least 3 characters.";
	}
	if($err == 0){
	$nt->Id = $_POST['id'];
	$nt->Name = $_POST['title'];
	$nt->Description = $_POST['fl'];
	$nt->Ndate = $_POST['date'];
	if($nt->Update()){
		$msg .= "Changed successfully.";
	}else{
		$msg .= $nt->Err;
	}
	Redirect("?m=noticefile&ms={$msg}");
	
  }
}

$nt->Id = $_GET['id'];
$nt->SelectById();
?>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="fl" value="<?php echo $nt->Description; ?>" />
<input type="hidden" name="date" value="<?php echo $nt->Ndate; ?>" />
<table width="901">
  <tr>
    <td width="69">&nbsp;</td>
    <td width="111"><b>Name:</b></td>
    <td width="413"><input type="text" name="title" value="<?php echo $nt->Name; ?>"></td>
    <td width="288"><?php mer($etitle); ?></td>
  </tr>
  <tr>
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