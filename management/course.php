<div class="o_container">

<?php
$cs = new Course();
$msg = "";
$err = 0;
$ename = "";

if(isset($_GET['ms'])){
	echo $_GET['ms'];
}

if(isset($_POST['sub'])){
	if($_POST['name'] == ""){
		$err++;
		$ename = "Designation name required.";
	}
	if($err == 0){
		$cs->Name = $_POST['name'];
		if($cs->Insert()){
			$msg .= "Insert successfully";
		}else{
			$cs->Err;
		}
	Redirect("?m=course&ms={$msg}");
	}
}

?>



<form action="" method="post">
<table align="center" width="600" align="center">
<tr>
<td colspan="3"><h3>Add Course</h3></td>
</tr>
<tr>
<tr>
<td width="148"><b>Course Name:</b></td>
<td width="163"><input type="text" name="name" /></td>
<td width="273"><?php mer($ename); ?></td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" name="sub" value="SAVE" /></td>
<td></td>
</tr>
</table>
</form>



<br />
<br />


<table align="center" width="400" border="1">
<tr>
<th colspan="3">
<?php 
if(isset($_GET['msg'])){
	mer($_GET['msg']);
}
?>
</th>
</tr>

<tr>
<th colspan="3">
<h3>View/Edit/Delete of Course</h3>
</th>
</tr>

<tr>
<th>Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
Table($cs->Select(), "course");
?>


</table>

<br />
<br />

</div><!-- End Of Container -->

</div>
