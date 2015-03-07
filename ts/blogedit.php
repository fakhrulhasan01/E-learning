<div class="o_container">


<?php 
$b = new Blog();
$epost = "";
$post = "";
$err = 0;
if(isset($_POST['sub'])){
	if($_POST['post'] == ""){
		$err++;
		$epost .= "Please enter your comment/problem/solution";
	}else if(strlen($_POST['post'])<4){
		$err++;
		$epost .= "Too short";
	}
	
	$b->Id = $_POST['id'];
	
	$b->SelectById();
	if($b->Description != ""){
		unlink("files/" . $b->Description);
	}

	if($err == 0){
		$b->Description = CreateFile($_POST['post']);
		if($b->Update()){
			$msg = "Updated successfully.";
		}else{
			$msg = $b->Err;
		}
		Redirect("?ts=blog&msg={$msg}");
	}
	
}

$b->Id = $_GET['id'];
$b->SelectById();
?>

<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<table width="400" border="0" align="center">
  <tr>
    <th colspan="3"><h4>Edit your comment</h4></th>
    
  </tr>
  <tr>
    <td><b>Comment/Post</b></td>
    <td><textarea style="width:260px; float:right; height:140px;" name="post"><?php FileRead("files/" . $b->Description); ?></textarea></td>
    <td><?php mer($epost); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input style="float:right" type="submit" name="sub" value="Update" /></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
</div>
</div>