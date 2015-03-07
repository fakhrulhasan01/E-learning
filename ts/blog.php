<style type="text/css">
.o_containe table{
	border:1px #F5F5F5 solid;
}
.o_containe tr{
	border:1px #F5F5F5 solid;
}

.o_containe td{
	border:1px #F5F5F5 solid;
}

.o_containe th{
	border:1px #F5F5F5 solid;
}

/*.o_container table{
	border:1px #CCC solid;	
}
.o_container th{
	border:1px #CCC solid;
}*/
#scom table{
	border:1px #CCC solid;
}
#scom tr{
	border:1px #CCC solid;
}
#scom td{
	border:1px #CCC solid;
}

#scom a{
	text-decoration:none; color:#666;
}
#scom a:hover{
	text-decoration:underline; color:#333; font-weight:bold;
}


.o_container a{
	color:#333; margin:0px 0px 0px 12px;
}
.o_container a:hover{
	color:#000; margin:0px 0px 0px 14px; font-weight:bold;
}
</style>


<div class="o_container" style="background-color:#EBEBEB">
<br>
<br>


<?php
$st = new Student();
$tc = new Teacher();
$b = new Blog();
$msg = "";
$err = 0;


/*echo $st->sb();
echo $tc->tb();
*/


$msg = "";
if(isset($_POST['sub'])){
	
	if($_POST['bl'] == ""){
		$err++;
		$msg .= "&nbsp;&nbsp;&nbsp;&nbsp;Can't post a blank comment";
		//mer($msg);
	}
	if($err == 0){
		$b->Description = CreateFile($_POST['bl']);
		$b->TeacherId = $_SESSION['tid'];
		$b->StudentId = $_SESSION['sid'];
	
		$b->Pdate = date("Y/m/d");
		
		if($b->Insert()){
			$msg .= "Posted success.";
			Redirect("?ts=blog&msg={$msg}");
		}else{
			$msg .= $b->Err;
		}
	}
	
}




/*Post comment on blog*/
			$bc = new BlogComment();
			$stay = "";
			$ecomment = "";
			$msgg = "";
			$err = 0;
				if(isset($_POST['comment'])){
					$stay = $_POST['stay'];
					if($_POST['blogcomment'] == ""){
						$err++;
						$ecomment = "You can't post a blank post";	
					}
					if($err == 0){
						$bc->Description = CreateFile($_POST['blogcomment']);
						$bc->BlogId = $_POST['stay'];
						if(isset($_SESSION['tid'])){
							$bc->TeacherId = $_SESSION['tid'];
							$bc->StudentId = 0;
						}else{
							$bc->TeacherId = 0;
							$bc->StudentId = $_SESSION['sid'];
						}
						$bc->Cdate = $_POST['date'];
						if($bc->Insert()){
							$msgg = "Comment posted";
						}else{
							$msgg = $bc->Err;
						}
					}
					echo $_POST['blogcomment'];
				}

?>



<table width="600">
  <tr>
  	<td></td>
	<td colspan="2">
    <?php 
	if(isset($_GET['msg'])){
		if($msg == ""){
		mss($_GET['msg']);
		}
	}
	mer($msg);
	?>
    </td>
  </tr>
  <tr>
    <td colspan="2" rowspan="3">&nbsp;</td>
    <td><b>Your Problem:</b></td>
  </tr>
<form action="?ts=blog" method="post">
  <tr>
    <td width="422"><textarea style="width:340px; height:140px;" name="bl"></textarea></td>
  </tr>
  <tr>
    <td><input style="float:right; margin:0px 74px 0px 0px; width:80px;" type="submit" name="sub" value="Post"></td>
  </tr>
</form>
</table>


<table width="804" class="o_containe" align="center">
<tr>
<th width="156">Name</th>
<th width="431">Problem/Solution</th>
<th width="201">Replay/Edit/Delete</th>

</tr>

<?php
$r = $b->Select();
if($r != ""){
	for($i=0; $i<count($r); $i++){
?>
    <tr>
    <?php
	if($r[$i][2] != 0){
		$tc->Id = $r[$i][2];
		$tc->SelectById();
		 echo "<td><font color='green'><b>{$tc->Name}</b></font></td>";
	}else{
		$st->Id = $r[$i][3];
		$st->SelectById();
		echo "<td>{$st->Name}</td>";
	}
    ?>
    <td><?php Readfile("files/" . $r[$i][1]); ?></td>

    <td>
    <a onclick="document.getElementById('div_name2<?php echo $r[$i][0]; ?>').style.display='';return false;" 
		href="" style="text-decoration:none;border-bottom:1px dotted blue;">
			Replay</a>
    

    <?php if(isset($_SESSION['tid'])){
		if($_SESSION['tid'] == $r[$i][2]){
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href='?ts=blogedit&id={$r[$i][0]}'>Edit</a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href='?ts=blogdelete&id={$r[$i][0]}'>Delete</a>";
	}}else if(isset($_SESSION['sid'])){
		if($_SESSION['sid'] == $r[$i][3]){
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href='?ts=blogedit&id={$r[$i][0]}'>Edit</a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  <a href='?ts=blogdelete&id={$r[$i][0]}'>Delete</a>";		
	}}else{
		?>
        </td>
    <?php }?>
    </tr>
    
    <tr>
    <td></td>
    <td colspan="2">
    	<?php 
		$bc->BlogId = $r[$i][0];
		$rr = $bc->Select();
		$teacher = "";
		$student = "";
		if($rr != ""){
		  echo '<div id="scom">';
    	  echo '<table width="700">';
			for($j=0; $j<count($rr); $j++){
			echo "<tr>";
				echo "<td style='width:120px'>";
					if($rr[$j][3] != "0"){
						$teacher = $rr[$j][3];
						$tc->Id = $rr[$j][3];
						$tc->SelectById();
						echo "<font color='green'>".$tc->Name."</font>";
					}else{
						//echo $rr[$j][4];
						$student = $rr[$j][4];
						$st->Id = $rr[$j][4];
						$st->SelectById();
						echo "<font color='black'>".$st->Name."</font>";						
					}
				echo "</td>";
				
				echo "<td>";
					FileRead("files/{$rr[$j][1]}");
				echo "</td>";
				
				if(isset($_SESSION['tid'])){
					if($_SESSION['tid'] == $teacher){
						echo "<td><a href='?ts=commentedit&id={$rr[$j][0]}&eid'>Edit</a></td>";
						echo "<td><a href='?ts=commentdel&id={$rr[$j][0]}'>Delete</a></td>";
					}
				}else if(isset($_SESSION['sid'])){
					if($_SESSION['sid'] == $student){
						echo "<td><a href='?ts=commentedit&id={$rr[$j][0]}'>Edit</a></td>";
						echo "<td><a href='?ts=commentdel&id={$rr[$j][0]}'>Delete</a></td>";
					}
				}else{
					echo "<td></td><td></td>";
				}
				
			echo "</tr>";
			}
		echo "</table></div>";		
		}
		if($stay == $r[$i][0]){
		?>
    	<div id="div_name2<?php echo $r[$i][0]; ?>" style="">
        <?php 
			mss($msgg);
			mer($ecomment);
		?>
			
            <form action="" method="post">
            <input type="hidden" name="stay" value="<?php echo $r[$i][0]; ?>" />
            	<textarea name="blogcomment" style="width:400px; height:120px;"></textarea>
				<br />
                <input type="button" onclick="document.getElementById('div_name2<?php echo $r[$i][0]; ?>').style.display='none';return false;" value="Hide" />
                <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>" />
                <input type="submit" name="comment" value="Post">
            </form>
		</div>
		<?php }else{	?>			
    	<div id="div_name2<?php echo $r[$i][0]; ?>" style="display:none;">
			
            <form action="#div_name2<?php echo $r[$i][0]; ?>" method="post">
            <input type="hidden" name="stay" value="<?php echo $r[$i][0]; ?>" />
            	<textarea name="blogcomment" style="width:400px; height:120px;"></textarea>
				<br />
                <input type="button" onclick="document.getElementById('div_name2<?php echo $r[$i][0]; ?>').style.display='none';return false;" value="Hide" />
                <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>" />
                <input type="submit" name="comment" value="Post">
            </form>
        	
           
		</div>
	<?php }?>
	</td>
    </tr>
<?php }}?>
</table>
<br />
</div>
</div>