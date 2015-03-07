<?php 
$hm = new Homepage();

if(isset($_GET['ac'])){
	$hm->Id = $_GET['ac'];
	$hm->SelectById();
	$hm->Location = "noh";
	if($hm->Update()){
		//Redirect("?a=homepage&ms=Successfully Inactivated");
	}
}else if(isset($_GET['inac'])){
	$hm->Id = $_GET['inac'];
	$hm->SelectById();
	$hm->Location = "h";
	if($hm->Update()){
		//Redirect("?a=homepage&ms=Successfully Activated");
	}
}else if(isset($_GET['imgdelid'])){
	$hm->Id = $_GET['imgdelid'];
	$hm->SelectById();
	$hm->Picture = "";
	$hm->Update();
}
?>
<div class="o_container">
<style type="text/css">
td{
	padding:10px;
	text-align:justify;
}
th{
	padding:4px;
}
</style>
<br />
<br />

<table width="800" border="1" align="center">
<tr>
<th width="97">Title</th>
<th width="525">Description</th>
<th width="80">Picture</th>
<th width="70">Edit</th>
<th width="70">Activation</th>
<th width="70">Remove Picture</th>
</tr>
<?php 
$hm->Location = 'noh';
$r = $hm->Select();
//Table($r, "homepage");
if($r != ""){
	for($i=0; $i<count($r); $i++){
		echo "<tr>";
			echo "<td>".$r[$i][1]."</td>";
			echo "<td>";
			FileRead("files/" . $r[$i][2]);
			echo "</td>";
			echo "<td><img src='images/".$r[$i][3]."' height='80' width='120' /></td>";
			echo "<td><a href='?m=homepageedit&id=".$r[$i][0]."'>Edit</a></td>";
			if($r[$i][4] == "h"){
				echo "<td><a href='?m=homepage&ac=".$r[$i][0]."'>Inactivate</a></td>";
			}else{
				echo "<td><a href='?m=homepage&inac=".$r[$i][0]."'>Activate</a></td>";
			}
			
			if($r[$i][3] != ""){
				echo "<td><a href='?m=homepage&imgdelid=".$r[$i][0]."'>Delete Picture</a></td>";
			}else{
				echo "<td>Click Edit <br />to Add Picture</td>";
			}
		echo "</tr>";
	}
}
?>
</table>
<br />
<br />

</div>
</div>