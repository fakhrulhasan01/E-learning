<div id="templatemo_image_fader" style="background-color:#C9C; height:400px;">
<?php
$cs = new Course();
$qs = new Question();



$msg = "";
$err = 0;

if(isset($_POST['sub'])){
	if($_POST['que'] == ""){
		$err++;
		$msg .= "{$err}. Please enter a valid question.";
	}
	if($_POST['csid'] == 0){
		$err++;
		$msg .= "{$err}. Please select course";
	}
	
	
	if($err == 0){
		$qs->Id = $_POST['id'];
		$qs->SelectById();
		$q = "files/" . $qs->Question;
		unlink($q);
		
		
		$date1 = $_POST['ftime'];
		$date1 = date('y/m/d H:i:s', strtotime($date1));
		$date2 = $_POST['ttime'];
		$date2 = date('y/m/d H:i:s', strtotime($date2));

		$qs->Id = $_POST['id'];
	    $qs->Question = CreateFile($_POST['que']);
	    $qs->Mark = $_POST['mark'];
		$qs->CourseId = $_POST['csid'];
		$qs->TeacherId = $_SESSION['tid'];
		$qs->FromDate = $date1;
		$qs->ToDate = $date2;
		
		if($qs->Update()){
			$msg .= "Question changed successfully.";
		}else{
			$msg .= $qs->Err;
		}

	
/*$sql = "insert into question(question, courseid, teacherid)
					values('".$_POST['que']."', '".$_POST['csid']."', '".$_SESSION['tid']."')";
					
					if(mysql_query($sql)){
						$msg .= "Insert Successfully";
					}else{
						$msg .= mysql_error();
					}
*/					}
					Redirect("?t=postquestion&ms={$msg}");
}



$qs->Id = $_GET['id'];
$qs->SelectById();

?>
<div class="que" style="float:left; margin:20px 0px 0px 20px;">

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



<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<table width="600">
  <tr>
  <td colspan="2"><h3>Change Question</h3></td>
  </tr>	
  <tr>
    <td width="149"><b>Question:</b></td>
    <td width="439"><textarea name="que"><?php FileRead("files/" . $qs->Question); ?></textarea></td>
  </tr>
  <tr>
    <td width="149"><b>Marks:</b></td>
    <td width="439"><input type="text" name="mark" value="<?php echo $qs->Mark; ?>" /></td>
  </tr>
  <tr>
    <td><b>Course:</b></td>
    <td>
    <select name="csid">
    <option value="0">Select One</option>
    <?php
    	Selected($cs->Select(), $qs->CourseId);
	?>
    </select>
    </td>
  </tr>
  <tr>
    <td><b>From Date/Time:</b></td>
    <td>	  		<input type="Text" name="ftime" readonly="readonly" value="<?php echo $qs->FromDate; ?>" id="demo1" maxlength="25" size="25"><a href="javascript:NewCal('demo1','ddmmmyyyy',true,24)"><img src="img/cal.gif" width="30" height="20" border="0" alt="Pick a date"></a>
</td>
  </tr>
  
  <tr>
    <td><b>To Date/Time:</b></td>
    <td><input type="Text" name="ttime" readonly="readonly" value="<?php echo $qs->ToDate; ?>" id="demo" maxlength="25" size="25"><a href="javascript:NewCal('demo','ddmmmyyyy',true,24)"><img src="img/cal.gif" width="30" height="20" border="0" alt="Pick a date"></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Change" /></td>
  </tr>
</table>
</form>
<br />



</div>

</div>
