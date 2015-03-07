<div class="o_container">
<?php
	$msg = "";
	$sql = "select * from student where verification = '".MS($_GET['ve'])."'";
	//echo $sql;
	$sql = mysql_query($sql);
	if(mysql_num_rows($sql) > 0) {
		$sql2 = "update student set verification = '"."1"."' where verification = '".MS($_GET['ve'])."'";
		if(mysql_query($sql2)) {
			$msg .= "Account verified";	
		}
		else {
			$msg .= "Wrong verification code";	
		}
		Redirect("index.php?ms={$msg}");	
	}
	else {
		$msg .= "Wrong verification code";	
		Redirect("index.php?ms={$msg}");	
	}
	

?>
</div>