<style type="text/css">
.que table{
	border:1px #C30 solid;
}
/*.main_featured tr{
	border:1px #C30 solid;
}*/
.que td{
	border:1px #CCC solid;
}
.que table{
	border:1px #CCC solid;	
}
.que th{
	border:1px #CCC solid;
}
.que table{
	border-bottom:1px #CCC solid;
}
</style>
<div id="templatemo_image_fader" style="background-color:#F4F4F4; height:400px;">

<div class="que" style="float:left; margin:20px 0px 0px 20px;">
<?php 
$ans = new Answer();
$qs = new Question();



?>

<table width="762" border="1" style="margin:0px 0px 0px 40px;">

  <tr>
    <td colspan="7"><a href="?s=youranswer">See your answer</a></td>
  </tr>

  <tr>
    <td colspan="7">Your Total Marks is: <p><?php 
								  $ans->StudentId = $_SESSION['sid'];
								  $ans->SelectMarks();
								  echo $ans->Marks;
								  ?></p>
    				out of <p>
							<?php 
									$qs->CourseId = $st->CourseId;
									$qs->TeacherId = $st->TeacherId;
									$qs->SelectMark();
									echo $qs->Mark;
							      
								  ?>
                                    </p>
	</td>
  </tr>


  <tr>
    <th width="237">Question</th>
    <th width="54">Marks</th>
    <th width="141">Course Teacher</th>
    <th width="128">Course</th>
    <th width="80">From Date</th>
    <th width="80">To Date</th>
    <th width="82">Post Answer</th>
  </tr>
  
  
<?php
$qs->FromDate = "ex";//It means that fromdate is not empty
$qs->TeacherId = $st->TeacherId;
$qs->CourseId = $st->CourseId;
$r = $qs->Select();
if($r != ""){
for($i=0; $i<count($r); $i++){
?>
<tr>
<td><?php FileRead("files/" . $r[$i][1]); ?></td>
<td><?php echo $r[$i][3]; ?></td>
<td><?php echo $r[$i][4]; ?></td>
<td><?php echo $r[$i][2]; ?></td>
<td><?php echo $r[$i][5]; ?></td>
<td><?php echo $r[$i][6]; ?></td>
<td><a href="?s=postans&id=<?php echo $r[$i][0]; ?>">Post Answer</a></td>
</tr>
<?php 
}
}
?>
</table>
</div>
</div>
</div>