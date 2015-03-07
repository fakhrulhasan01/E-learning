<div class="o_container"><br>
<?php
$an = new Answer();
$an->QuestionId = $_GET['id'];
$r = $an->SelectAnswerByQuestionToStudent();

if($r != ""){
	for($i=0; $i<count($r); $i++){
?>
<table width="606">
            <tr>
            <td width="177">&nbsp;</td>
            <td width="82">Question:</td>
            <td width="331"><?php FileRead("files/" . $r[$i][1]); ?></td>
            </tr>
            
            <tr>
            <td width="177">&nbsp;</td>
            <td>Your Answer:</td>
            <td><?php FileRead("files/" . $r[$i][2]);?></td>
            </tr>
</table>
<?php } }else{echo "<h4 style='color:red; padding:20px 0px 20px 60px;'>You didn't answer on this question</h4>";}?>
</div>