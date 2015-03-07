<div class="o_container">


<?php 
$bc = new BlogComment();
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
	
	$bc->Id = $_POST['id'];
	
	$bc->SelectById();
	if($bc->Description != ""){
		unlink("files/" . $bc->Description);
	}

	if($err == 0){
		$bc->Description = CreateFile($_POST['post']);
		if($bc->Update()){
			$msg = "Updated successfully.";
		}else{
			$msg = $bc->Err;
		}
		Redirect("?ts=blog&msg={$msg}");
	}
	
}

$bc->Id = $_GET['id'];
$bc->SelectById();
?>

<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<table width="400" border="0" align="center">
  <tr>
    <th colspan="3"><h4>Edit your comment</h4></th>
    
  </tr>
  <tr>
    <td><b>Comment/Post</b></td>
    <td><textarea style="width:260px; float:right; height:140px;" name="post"><?php FileRead("files/" . $bc->Description); ?></textarea></td>
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