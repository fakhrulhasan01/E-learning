<div id="templatemo_image_fader" style="background-color:#F4F4F4; height:auto; margin:-40px 0px 0px 0px;">
<div style="background-color:#F4F4F4;">


<style type="text/css">
input{
	width:180px;
	height:22px;
}
select{
	width:180px;
	height:26px;
}
textarea{
	width:180px;
	height:80px;
}
</style>

<?php
$ct = new CourseTeacher();
$cs = new Course();
$qs = new Question();



/*$date = new DateTime();
echo $date->format('Y-m-d H:i:s');			
*/
$msg = "";
$equestion = "";
$ecourse = "";
$emark = "";
$efromtime = "";
$etotime = "";

if(isset($_POST['sub'])){
	if(strlen($_POST['que']) <= 6){
		$err++;
		$equestion = "Please enter a valid question.";
	}
	if($_POST['csid'] == 0){
		$err++;
		$ecourse = "Please select course";
	}
	if($_POST['mark'] == ""){
		$err++;
		$emark = "Please put mark on this question.";
	}
	if($_POST['ftime'] == ""){
		$err++;
		$efromtime = "Please put start date and time";
	}
	if($_POST['ttime'] == ""){
		$err++;
		$etotime = "Please put end date and time";
	}

	if($err == 0){
		
		$date1 = $_POST['ftime'];
		$date1 = date('Y-m-d H:i:s', strtotime($date1));
		echo $date1 . "<br />";
		
		$date2 = $_POST['ttime'];
		$date2 = date('Y-m-d H:i:s', strtotime($date2));
		echo $date2 . "<br />";
		
	    $qs->Question = CreateFile($_POST['que']);
		$qs->Mark = $_POST['mark'];
		$qs->CourseId = $_POST['csid'];
		$qs->TeacherId = $_SESSION['tid'];
		$qs->FromDate = $date1;
		$qs->ToDate = $date2;
		
		if($qs->Insert()){
			$msg .= "Question posted successfully.";
		}else{
			$msg .= $qs->Err;
		}
	    Redirect("?t=postquestion&msg={$msg}");
	}
}

?>
<div class="que" style="float:left; margin:20px 0px 0px 20px; background-color:#F4F4F4;">




<form action="" method="post">
<table width="922">
  <tr>
    <td colspan="4">
	<?php
    	if(isset($_GET['msg'])){
			mss($_GET['msg']);
		}
	?>
    </td>
  </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="118"><b>Question:</b></td>
    <td width="255"><textarea name="que"></textarea></td>
    <td width="403"><?php mer($equestion); ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><b>Course:</b></td>
    <td>
    <select name="csid">
    <option value="0">Select One</option>
    <?php
    	Select($ct->Select());
	?>
    </select>
    </td>
    <td width="403"><?php mer($ecourse); ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><b>Marks</b></td>
    <td><input type="text" name="mark"/></td>
    <td width="403"><?php mer($emark); ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><b>From Date/Time:</b></td>
    <td><input type="Text" name="ftime" readonly="readonly" id="demo1" maxlength="25" size="25"><a href="javascript:NewCal('demo1','ddmmmyyyy',true,24)"><img src="img/cal.gif" width="30" height="20" border="0" alt="Pick a date"></a>
</td>
    <td width="403"><?php mer($efromtime); ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><b>To Date/Time:</b></td>
    <td><input type="Text" name="ttime" readonly="readonly" id="demo" maxlength="25" size="25"><a href="javascript:NewCal('demo','ddmmmyyyy',true,24)"><img src="img/cal.gif" width="30" height="20" border="0" alt="Pick a date"></a></td>
    <td width="403"><?php mer($etotime); ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Post" /></td>
  </tr>
</table>
</form>
<br />



<table align="center" width="837">

<tr bgcolor="#00FF99">
<th width="229" height="44">Question</th>
<th width="169">Course</th>
<th width="47">Marks</th>
<th width="102">Course Teacher</th>
<th width="79">From Time</th>
<th width="79">To Time</th>
<th width="39">Edit</th>
<th width="45">Delete</th>
<th width="91">See Answers</th>
</tr>


<?php 
$qs->TeacherId = $_SESSION['tid'];
$r = $qs->Select();
Table($r, "question");
?>


</table>
</div>
</div>

</div>
</div>