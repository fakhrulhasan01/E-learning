<style type="text/css">
.o_c table{
	border:1px #C30 solid;
}
/*.main_featured tr{
	border:1px #C30 solid;
}*/
.o_c td{
	border:1px #CCC solid;
}
.o_c table{
	border:1px #CCC solid;	
}
.o_c th{
	border:1px #CCC solid;
}
.o_c table{
	border-bottom:1px #CCC solid;
}
</style>
<div class="o_container"><br>

<table align="left" width="600">
	<tr>
    	<td><h2> &nbsp;&nbsp;Your Answer and mark list</h2></td>
    </tr>
</table>
<?php 
$qs = new Question();
$an = new Answer();

$cid = $st->CourseId;
$tid = $st->TeacherId;

$qs->CourseId = $cid;
$qs->TeacherId = $tid;
$r = $qs->Select();
?>


<div class="o_c">
  <table border="1" align="center" width="900">
  <tr>
  <th>Question</th>
  <th>Answer</th>
  <th width="58">Given Number</th>
  <th width="35">Out of</th>
  </tr>
  <?php 
  if($r!= ""){
	  for($i=0; $i<count($r); $i++){
  ?>
  
  <tr>
  <td width="292" height="10"><?php FileRead("files/" . $r[$i][1]);?></td>
  <?php 
		  $an->QuestionId = $r[$i][0];
		  $an->StudentId = $_SESSION['sid'];
		  $rr = $an->Select();
		  if($rr != ""){
			 for($j=0; $j<count($rr); $j++){?>
              <td width="487"><?php FileRead("files/{$rr[$j][3]}"); ?></td>
              <td style="text-align:center"><?php echo $rr[$j][6]; ?></td>
			 <?php }
		  }else{
			  echo "<td colspan='2'><b style='color:red'>You did't answer on this question.</b></td>";
		  }
  ?>
  <td style="text-align:center"><?php echo $r[$i][3]; ?></td>
  </tr>
  <?php }}?>
  </table>
  <br />
  </div>
</div>
</div>
</div>
