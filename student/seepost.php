<div id="templatemo_image_fader" style="background-color:#F3F3F3; height:auto; padding:80px 0px 40px 0px;">
<style type="text/css">
td{
	padding:6px;
}

#taable th{
	border:2px #FFF solid;
}
#taable tr{
	border:2px #FFF solid;
}
#taable td{
	border:2px #FFF solid;
}
#taable table{
	border:2px #FFF solid;
}
</style>

<?php
$fl = new File();
$fl->TeacherId = $st->TeacherId;
$fl->CourseId = $st->CourseId;
$r = $fl->Select();
?>
<div id="taable">
<table width="528" align="center">
<tr bgcolor="#CCCCCC" style="font-size:16px; height:48px">
<th width="119" height="32">Title</th>
<th width="106" height="32">Files</th>
<th width="143">On Course</th>
<th width="140">Uploaded By</th>
</tr>
<?php
Table($r, "");
?>
</table>
</div>

</div>
</div>