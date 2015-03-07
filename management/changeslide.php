<div class="o_container">

<?php
$ss = new SlideShow();
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
		$ss->Name = $_POST['name'];
		if($ss->Insert()){
			$msg .= "Insert successfully";
		}else{
			$ss->Err;
		}
	}
	Redirect("?m=course&ms={$msg}");
}

?>






<h3>View/Edit of Slide Images</h3>

<table align="center" width="400" border="1">

<tr>
<th width="300">Images</th>
<th width="84">Edit</th>
</tr>
'
<?php
$r = $ss->Select();
//Table($ss->Select(), "slide");
if($r != ""){
	for($i=0; $i<count($r); $i++){
	echo "<tr><td><img src='images/{$r[$i][1]}' width='260' height='80'/></td><td><a href='?m=slideedit&id={$r[$i][0]}'>Edit</a></td></tr>";
	}
}
?>


</table>


</div><!-- End Of Container -->


