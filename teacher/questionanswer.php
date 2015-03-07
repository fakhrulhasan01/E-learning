<style type="text/css">
.ii table{
	border:1px #CCC solid;
}
.ii tr{
	border:1px #CCC solid;
}
.ii td{
	border:1px #CCC solid;
}
.ii th{
	border:1px #CCC solid;
}

</style>
<div id="templatemo_image_fader" style="background-color:#F4F4F4; height:400px;">


<?php 
$ans = new Answer();
$qs = new Question();
$msg = "";


//$ans->Marks;

//echo Mark();
if(isset($_POST['sub'])){
$ans->QuestionId = $_POST['qid'];
$ans->SelectById();
	
	if($_POST['mk'] > $ans->Marks){
		$msg = "Invalid marks";
	}else if($_POST['mk'] == ""){
		$msg = "You submit a blank field";
	}else{
		$ans->QuestionId = $_POST['qid'];
		$ans->StudentId = $_POST['stid'];
		$ans->SelectById();
		$ans->Marks = $_POST['mk'];
		if($ans->Update()){
			$msg = "Marks given";
			Redirect("?t=questionanswer&msg={$msg}&id={$_POST['qid']}");
		}else{
			$msg = $ans->Err;
		}
		
	}
}

?>


<br />
<br />
<?php
$ans->StudentId = "";
$ans->QuestionId = $_GET['id'];
$r = $ans->Select();
if($r != ""){
?>

<table width="600" align="center">
<tr>
<td>
<?php 
if(isset($_GET['msg'])){
	if($msg == ""){
	mss($_GET['msg']);
	}
}
if($msg != ""){
	mer($msg);
}

?>
</td>
</tr>
</table>


<div class="ii">
<table width="800" border="1" align="center">
<tr bgcolor="#999999" style="color:#FFF;">
<th width="132">Question</th>
<th width="424">Answer</th>
<th width="50">Marks On It</th>
<th width="86">Answered By</th>
<th width="84">Give Mark</th>
</tr>
<?php 
for($i=0; $i<count($r); $i++){?>
<tr>
<td><?php FileRead("files/" . $r[$i][2]); ?></td>
<td><?php FileRead("files/" . $r[$i][3]); ?></td>
<td><?php echo $r[$i][4]; ?></td>
<td><?php echo $r[$i][5]; ?></td>
<td>
<form action="" method="post">
<input type="hidden" name="qid" value="<?php echo $r[$i][0]; ?>" />
<input type="hidden" name="stid" value="<?php echo $r[$i][1]; ?>" />
<input type="text" name="mk" value="<?php echo $r[$i][6]; ?>" /><br />
<input type="submit" name="sub" value="Give" />
</form>
</td>
</tr>
<?php }?>
</table>
</div>
<?php }else{			
echo "<h4 style='text-align:center; color:red;'>No answer posted on this question.</h4>";
}




?>






</div>
</div>