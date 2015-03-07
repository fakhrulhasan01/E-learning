<div class="o_container">
<style type="text/css">
td{
	padding:6px;
	text-align:justify;
}
</style>
<?php
$nt = new Notice();
if(isset($_POST['sub'])){
	$etitle = "";
	$edescription = "";
	$edate = "";
	
	$msg = "";
	$err = 0;
	if($_POST['title'] == ""){
		$err++;
		$etitle = "Please enter title of notice.";
	}else if(strlen($_POST['title'])<3){
		$err++;
		$etitle = "Name must be at least 3 characters.";
	}
	if(strlen($_POST['des'])<16){
		$err++;
		$edescription = "Description too short";
	}
	
	
	
	if($err == 0){
		$date = $_POST['date'];
		$nt->Name = $_POST['title'];
		$nt->Description = CreateFile($_POST['des']);
		$nt->Ndate = $date;
		if($nt->Insert()){
			$msg .= "Notice posted.";
		}else{
			$msg .= $nt->Err;
		}
		Redirect("?m=notice&msg={$msg}");
	}
	
}
?>
<br />

<form action="" method="post">
<table width="956">
  <tr>
  <td height="33" colspan="4">
  <?php
		if(isset($_GET['msg'])){
			echo $_GET['msg'];
		}
  ?>
	</td>
  </tr>
  <tr>
    <td width="62" height="35">&nbsp;</td>
    <td width="106"><strong>Title</strong></td>
    <td width="422"><input type="text" name="title" /><?php mer($etitle); ?></td>
  </tr>
  <tr>
    <td width="62" height="191">&nbsp;</td>
    <td width="106"><strong>File/Description</strong></td>
    <td width="422"><textarea name="des" style="width:400px; height:180px;"></textarea><?php mer($edescription); ?></td>
  </tr>
  <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>" />
  <tr>
    <td height="34">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Post" /></td>
  </tr>
  <tr>
  <td height="44" colspan="4"></td>
  </tr>
</table>
</form>

<table align="center" width="800" border="1">
<tr bgcolor="#CCCC99" style="text-align:center">
<th width="150">Title</th>
<th width="371">Description</th>
<th width="93">Date</th>
<th width="89">Edit</th>
<th width="63">Delete</th>
</tr>


<?php 
$r = $nt->Select();
if($r != ""){
	for($i=0; $i<count($r); $i++){
			if(substr($r[$i][2], -4) == ".txt"){
			echo "<tr>";
				?>
                <td><?php echo $r[$i][1]; ?></td>
                <td><?php FileRead("files/" . $r[$i][2]); ?></td>
                <td><?php echo $r[$i][3]; ?></td>
                <td><a href="?m=noticeedit&id=<?php echo $r[$i][0]; ?>">Edit</a></td>
                <td><a href="?m=noticedel&id=<?php echo $r[$i][0]; ?>">Delete</a></td>
      <?php 
		echo "</tr>";
		}
	}
}
?>



</table>
<br />
<br />

</div>