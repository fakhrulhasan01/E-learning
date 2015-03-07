<style type="text/css">
.pp td{
	background-color:#FFF;
	height:22px;
	font-size:14px;
}
.pp th{
	font-size:16px;
}
</style>
<div class="o_container">

<?php

$st = new Student();

$cs = new Course();
$ct = new CourseTeacher();
$cs->Select();
$msg = "";
$err = 0;
echo '<h2 style="margin:0px 0px 0px 40px;">';
if(isset($_GET['ms'])){
	echo $_GET['ms'];
}
echo "</h2>";

	if(isset($_POST['sub'])){
		if($_POST['cid'] == 0){
			$err++;
			$msg = $err . ". Please select at least one course.";
		}
		if($err == 0){
			$ct->TeacherId = $_SESSION['tid'];
			$ct->CourseId = $_POST['cid'];
			if($ct->Insert()){
				$msg .= "Course selected.";
			}else{
				$msg .= $ct->Err;
			}
		}
		Redirect("?t=courses&ms={$msg}");
	}


?>

<br />

<form action="" method="post">
<table width="300" style="margin:0px 0px 0px 40px;">
  <tr>
  <td colspan="2"><h4 style="margin:0px 0px 0px 40px;">You can't modify course. You just add course you teach.</h4></td>
  </tr>
  <tr>
  <td colspan="2"><h3 style="margin:0px 0px 0px 40px;">Add courses</h3></td>
  </tr>
  <tr>
    <td width="139"><b style="float:right;">Courses</b></td>
    <td width="149">
    <select name="cid" style="float:right; width:120px;">
    <option value="0">Select One</option>
		<?php 
			$ct->TeacherId = $_SESSION['tid'];
			Selected_multiple2($cs->Select(), $ct->Select());
		?>
    </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Add Course" style="float:right; width:120px;" /></td>
  </tr>

</table>
</form>




<br />
<div class="pp">
<table width="271" style="margin:0px 0px 0px 80px; text-align:center;">
  <tr bgcolor="#99FF00">
    <th width="263" height="30">Course Name</th>
  </tr>
  <?php
  $ct->TeacherId = $_SESSION['tid'];
$r = $ct->Select();
//Table($ss->Select(), "slide");
if($r != ""){
	for($i=0; $i<count($r); $i++){
	    $st->TeacherId = $_SESSION['tid'];
		$st->CourseId = $r[$i][1];
		$st->CountCourseStudent();
	echo "<tr><td>" . $r[$i][2]. " (" .$st->CourseId .") </td></tr>";
	}
}
?>
</table>
</div>
<br />
<br />




</div>
</div>
