<style type="text/css">
.o_container td{
	color:#414141; font-size:16px;
}
</style>

<div class="o_container">
<br />

<?php 
$cs = new Course();
$tc = new Teacher();

$cs->Id = $st->CourseId;
$cs->SelectById();

$tc->Id = $st->TeacherId;
$tc->SelectById();
?>

  <table width="593" align="center">
    <tr>
      <td height="26" colspan="3">Welcome Mr. <?php echo $st->Name; ?></td>
    </tr>
    <tr>
      <td height="26" colspan="3">Your Course: &nbsp;&nbsp; <?php echo $cs->Name; ?></td>
    </tr>
    <tr>
      <td height="28" colspan="3">Course Teacher: &nbsp;&nbsp; <?php echo $tc->Name; ?></td>
    </tr>
    <tr>
      <td>Add your <a href="?s=add_a_qualification">Academic Qualification</a></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
</div>