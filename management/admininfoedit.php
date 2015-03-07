<div class="o_container">
<?php
$hm = new Homepage();
if(isset($_POST['sub'])){
	$hm->Id = $_POST['id'];
	$hm->SelectById();


				if(($_FILES['pic']['name'] != "") && (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($hm->Picture != "")
					{
						$ppp = "images/" . $hm->Picture;
						unlink($ppp);
					}
					$hm->Picture = UploadPicture($_FILES['pic']);
				}
				

	
	$des = "largefiles/" . $hm->Description;
	unlink($des);
	
	$hm->Title = $_POST['title'];
	$hm->Description = CreateFile($_POST['desc']);
	if($hm->Update()){
		$msg .= "Changed successfully.";
	}else{
		$msg .= $hm->Err;
	}
	Redirect("?m=admininfo&ms={$msg}");
	
}

$hm->Id = $_GET['id'];
$hm->SelectById();
?>
<br />
<br />

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<table width="874" align="left">
  <tr>
    <td width="100">&nbsp;</td>
    <td width="82"><b>Title:</b></td>
    <td width="676"><input type="text" name="title" value="<?php echo $hm->Title; ?>"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b>Picture:</b></td>
    <td><input type="file" name="pic"><br /><img src="images/<?php echo $hm->Picture; ?>" height="80" width="120" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b>Description:</b></td>
    <td><textarea rows="20" name="desc"><?php FileRead("files/" . $hm->Description); ?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Update"></td>
  </tr>
</table>
</form>
<br />

</div>
</div>
