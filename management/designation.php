<div class="o_container">

<?php
$dg = new Designation();
$msg = "";
$err = 0;

if(isset($_GET['ms'])){
	echo $_GET['ms'];
}

if(isset($_POST['sub'])){
	if($_POST['desg'] == ""){
		$err++;
		$msg = "{$err}. Designation name required.";
	}
	if($err == 0){
		$dg->Name = $_POST['desg'];
		if($dg->Insert()){
			$msg .= "Insert successfully";
		}else{
			$dg->Err;
		}
	}
	Redirect("?m=designation&ms={$msg}");
}

?>


<h2>Add Designation</h2>
<form action="" method="post">
<table align="center" width="600">
<tr>
<td><b>Designation Name:</b></td>
<td><input type="text" name="desg" /></td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" name="sub" value="SAVE" /></td>
</tr>
</table>
</form>




<h3>View/Edit/Delete of Designation</h3>

<table align="center" width="400" border="1">

<tr>
<th>Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
Table($dg->Select(), "designation");
?>


</table>


</div><!-- End Of Container -->


