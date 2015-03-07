<?php 
$hm = new Homepage();

if(isset($_GET['idac'])){
	$hm->Id = $_GET['idac'];
	$hm->SelectById();
	$hm->Location = "No";
	if($hm->Update()){
		Redirect("?m=admininfo&ms=Inactivated for info");
	}
}



if(isset($_GET['idin'])){
	$hm->Id = $_GET['idin'];
	$hm->SelectById();
	$hm->Location = "a";
	if($hm->Update()){
		Redirect("?m=admininfo&ms=Activated for info");
	}
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

<table width="876" border="1" align="center">
<tr>
<th width="97">Title</th>
<th width="525">Description</th>
<th width="80">Picture</th>
<th width="70">Edit</th>
<th width="70">Active/Inactive</th>
<th width="70">Delete Image</th>
</tr>
<?php 
//Go select function in dalHomepage to understand this code.
$r = $hm->Select();
//Table($r, "homepage");
if($r != ""){
	for($i=0; $i<count($r); $i++){
		echo "<tr>";
			echo "<td>".$r[$i][1]."</td>";
			echo "<td>";
			FileRead("files/" . $r[$i][2]);
			echo "</td>";
			echo "<td>";
				if($r[$i][3] != ""){
				echo "<img src='images/".$r[$i][3]."' height='80' width='120' />";
				}else{
					echo "<b>No Image</b>";
				}
			echo "</td>";
			if($r[$i][4] == 'a'){
				echo "<td><a href='?m=admininfoedit&id=".$r[$i][0]."'>Edit</a></td>";
				echo "<td><a href='?m=admininfo&idac=".$r[$i][0]."'>Inactivate</a></td>";			
			}else{
				echo "<td><a href='?m=admininfoedit&id=".$r[$i][0]."'></a></td>";
				echo "<td><a href='?m=admininfo&idin=".$r[$i][0]."'>Activate</a></td>";			
			}
			echo "<td><a href='?m=del_admin_img&id=".$r[$i][0]."'>Delete Image</a></td>";
		echo "</tr>";
	}
}
?>
</table>
<br />
<br />

</div>
</div>