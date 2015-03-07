<div class="o_container">

<?php
$et = new ExamTitle();
$msg = "";
$err = 0;

if(isset($_GET['ms'])){
	echo $_GET['ms'];
}

if(isset($_POST['sub'])){
	if($_POST['name'] == ""){
		$err++;
		$msg = "{$err}. Designation name required.";
	}
	if($err == 0){
		$et->Name = $_POST['name'];
		if($et->Insert()){
			$msg .= "Insert successfully";
		}else{
			$et->Err;
		}
	}
	Redirect("?m=examtitle&ms={$msg}");
}

?>


<h2>Add Exam Title</h2>
<form action="" method="post">
<table align="center" width="600">
<tr>
<td><b>Exam Title Name:</b></td>
<td><input type="text" name="name" /></td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" name="sub" value="SAVE" /></td>
</tr>
</table>
</form>




<h3>View/Edit/Delete of Course</h3>

<table align="center" width="400" border="1">

<tr>
<th>Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
Table($et->Select(), "examtitle");
?>


</table>


</div><!-- End Of Container -->


