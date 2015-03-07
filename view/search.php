 <?php 
	mysql_connect("localhost", "root", "");
	mysql_select_db("jquery");
	echo "Hello";
	//echo "Hello World";
/*	if(isset($_POST['search_term'])){
		$err = 0;
		if($_POST['search_term'] != ""){
			$sql = "select * from cities where name like '%".$_POST['search_term']."%'";
			echo $sql;
			echo "<br/> <br/>";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				if(strtolower($d[1]) == strtolower($_POST['search_term'])){
					$err++;
					echo "This user name is unavailable";
				}
				
				//echo $d[1];
				/*echo " &nbsp;";
				echo $d[2];
				echo "<br />";*/
/*			}
			
			if($err == 0){
					echo "This user name is available";
			}
		}
	}
*/ 
?>