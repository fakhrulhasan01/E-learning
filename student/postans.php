<style type="text/css">
.o_containe table{
	border:1px #C30 solid;
}
/*.main_featured tr{
	border:1px #C30 solid;
}*/
.o_containe td{
	border:1px #CCC solid; padding:4px 4px 4px 4px;
}
.o_containe table{
	border:1px #CCC solid; border-right:1px #CCC solid; border-bottom:1px #CCC solid;
}
.o_containe th{
	border:1px #CCC solid;
}
.o_containe table{
	border-bottom:1px #CCC solid;
}
</style>
<div class="o_container"><br>
<br>
<?php 

$an = new Answer();
$qs = new Question();
$qs->Id = $_GET['id'];
$qs->SelectById();

?>



    <?php 
	$err = 0;
	$eanswer = "";
	if(isset($_POST['sub'])){
		
		if(strlen($_POST['answer'])<3){
			$err++;
			$eanswer = "answer is too short or empty";
		}
		
		if($err == 0){
		$an->QuestionId = $_POST['qid'];
		$an->StudentId = $_SESSION['sid'];
		$an->Answer = CreateFile($_POST['answer']);
		
		if($an->Insert()){
			$msg .= "You have posted answer successfully.";
		}else{
			$an->Err;
		}
		Redirect("?s=postans&id={$_POST['qid']}&msg={$msg}");
		}
	}
	$an->StudentId = $_SESSION['sid'];
	$an->QuestionId = $_GET['id'];
	$an->SelectById();
	$r = $an->Select();
	if($r != ""){
		echo "<center><h4 style='color:red'>You already answered on this question.</h4></center>";
		?>
        <table width="600" align="center">
          <tr>
            <td width="150"></td>
            <td colspan="2"><?php if(isset($_GET['msg'])){mss($_GET['msg']);}?> </td>
          </tr>
        
        </table>
 <table class="o_containe" width="600" align="center">
 <tr>
 <th width="258">Question</th>
 <th width="326">Answer</th>
 </tr>
 <tr>
 <td><?php FileRead("files/" . $qs->Question); ?></td>
 <td><?php FileRead("files/" . $an->Answer); ?></td>
 </tr>
 </table><br /><br />
 <?php 
	}else{
?>
<form action="" method="post">
<input type="hidden" name="qid" value="<?php echo $_GET['id']; ?>" />
<table width="791">

  <tr>
    <td width="199"></td>
    <td width="103"><b>Question</b></td>
  	<td width="200"><?php FileRead("files/" . $qs->Question); ?></td>
    <td width="269"></td>
  </tr>
   
   <tr> 
    <td>&nbsp;</td>
    <td><b>Answer:</b></td>
    <td>
    <textarea style="width:200px; height:100px" name="answer"></textarea>
    </td>
    <td><?php mer($eanswer); ?></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td><input type="submit" name="sub" value="Send"></td>
    <td>&nbsp;</td>
  </tr>

</table>
</form>
<?php }?>

</div>
</div>
</div>