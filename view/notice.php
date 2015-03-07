<div class="o_container" style="background-color:#F2F2F2">
<style type="text/css">
td{
	padding:18px 18px 18px 18px;
	font-family:Verdana, Geneva, sans-serif;
	background-color:#FFF;
	text-align:center;
}
th{
	padding:14px 0px 14px 0px;
	background-color:#FFF;
}
</style>
<?php 
$nt = new Notice();
//$nt->Ndate = 30;
$r = $nt->Select();
?>
<br />
<br />

<table width="660" align="center">
<tr>
<th width="185">Notice Title</th>
<th width="339">Description</th>
<th width="120">Post Date</th>
</tr>
<?php 
if($r != ""){
	for($i=0; $i<count($r); $i++){
?>
	<tr>
    	<td><?php echo $r[$i][1]; ?></td>
    	<td>
        <?php
					if((substr($r[$i][2], -4) == ".doc") || (substr($r[$i][2], -4) == "docx")){
						echo "<br/><a href='largefiles/{$r[$i][2]}' target='_blank'>
															<img src='img/doc.png' width='30' height='30'/>Download</a>";
					}else if(substr($r[$i][2], -4) == ".pdf"){
						echo "<br/><a href='largefiles/{$r[$i][2]}' target='_blank'>
															<img src='img/pdf.jpeg' width='30' height='30'/>Download</a>";
					}else if((substr($r[$i][2], -4) == ".ppt") || (substr($r[$i][2], -4) == "pptx")){
						echo "<br/><a href='largefiles/{$r[$i][2]}' target='_blank'>
															<img src='img/ppt.gif' width='30' height='30'/>Download</a>";
					}else if(substr($r[$i][2], -4) == ".txt"){
						read_files($r[$i][2], "200");
						echo "&nbsp;&nbsp;<a href='?p=noticedescription&id={$r[$i][0]}'>Read More</a>";
					}
		?>
        </td>
    	<td><?php echo $r[$i][3]; ?></td>
    </tr>
<?php 
	}
}
?>
</table>
<br />
<br />

</div>
</div>