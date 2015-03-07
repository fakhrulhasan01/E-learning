<?php
	function MS($data) {
		return mysql_real_escape_string(strip_tags($data));	
	}
	
	function mer($data) {
		echo "<p style='color:red; font-weight:bold; font-size:12px;'>" . $data . "</p>";	
	}
	
	function mss($data) {
		echo "<p style='color:green; font-weight:bold; font-size:13px;'>" . $data . "</p>";	
	}
	
	function Redirect($data) {
		echo "<script>";
		echo "self.location = '{$data}';";
		echo "</script>";	
	}
	
	
	function Table($data, $url){
		if($data == "") {
			echo "No Data Selected";	
		}else{
			for($i=0; $i < count($data); $i++) {
				if($i % 2 == 0) {
					echo "<tr bgcolor=''>";
				}else{
					echo "<tr bgcolor=''>";
				}
				for($j = 1; $j < count($data[$i]); $j++) {
					echo "<td>";
					if(
					   	(substr($data[$i][$j], -4) == ".jpg") || 
						(substr($data[$i][$j], -4) == ".png") || 
						(substr($data[$i][$j], -4) == ".gif") ||
						(substr($data[$i][$j], -4) == "jpeg"))
					{
						echo "<img src='images/{$data[$i][$j]}' width='50' />";	
					}
					else if(
					   	(substr($data[$i][$j], -4) == ".avi") || 
						(substr($data[$i][$j], -4) == ".mp4") || 
						(substr($data[$i][$j], -4) == ".flv") ||
						(substr($data[$i][$j], -4) == ".wmv"))
					{
						$format = substr($data[$i][$j], -3);
						echo $format;
					   //echo  $data[$i][$j];
						//echo "<embed src='video/{$data[$i][$j]}' width='200' height='100'></embed>";
						echo '<video width="320" height="240" controls autoplay>
							  <source src="movie.ogg" type="video/'.$format.'">
							  <object data="movie.mp4" width="320" height="240">
								<embed width="320" height="240" src="movie.swf">
							  </object>
							</video>';
					}
					else if(substr($data[$i][$j], -4) == ".txt")
					{
						FileRead("files/" . $data[$i][$j]);	
					}else if((substr($data[$i][$j], -4) == ".doc") || (substr($data[$i][$j], -4) == "docx")){
						echo "<br/><a href='largefiles/{$data[$i][$j]}' target='_blank'>
															<img src='img/doc.png' width='30' height='30'/>Download</a>";
					}else if(substr($data[$i][$j], -4) == ".pdf"){
						echo "<br/><a href='largefiles/{$data[$i][$j]}' target='_blank'>
															<img src='img/pdf.jpeg' width='30' height='30'/>Download</a>";
					}else if((substr($data[$i][$j], -4) == ".ppt") || (substr($data[$i][$j], -4) == "pptx")){
						echo "<br/><a href='largefiles/{$data[$i][$j]}' target='_blank'>
															<img src='img/ppt.gif' width='30' height='30'/>Download</a>";
					}
					else{
						echo $data[$i][$j];
					}
					echo "</td>";
				}
				if($url == "mark"){
					echo 	"<td>
								<form action='' method='post'>
								<input type='text' name='marks' />
								<input type='submit' name='sub' value='Submit' />
								</form>
							</td>";
				}
				else if($url == "question"){
					echo "<td><a href='?t={$url}edit&id={$data[$i][0]}'>Edit</a></td>";
					echo "<td><a href='?t={$url}del&id={$data[$i][0]}'>Delete</a></td>";
					echo "<td><a href='?t={$url}answer&id={$data[$i][0]}'>Show Answer</a></td>";					
				}
				else if($url == "doc"){
					echo "<td><a href='?t={$url}edit&id={$data[$i][0]}'>Edit</a></td>";										
					echo "<td><a href='?t={$url}delete&id={$data[$i][0]}'>Delete</a></td>";										
				}
				else if($url == "courses"){
				}else if($url == "video"){
					echo "<td><a href='?t={$url}del&id={$data[$i][0]}'>Delete</a></td>";
				}else if($url == "homepage"){
					echo "<td><a href='?m={$url}edit&id={$data[$i][0]}'>Edit</a></td>";															
				}else if($url == "post"){
					echo "<td><a href='?s={$url}ans&id={$data[$i][0]}'>Post Answer</a></td>";															
				}
				else if($url == ""){
				}
				
				else{
					echo "<td><a href='?m={$url}edit&id={$data[$i][0]}'>Edit</a></td>";
					echo "<td><a href='?m={$url}del&id={$data[$i][0]}'>Delete</a></td>";
				}
				echo "</tr>";
			}	
		}
	}
	




	
	
	
	function Check($data){
		for($i = 0; $i < count($data); $i++) {
			echo "<input type='checkbox' name='chk' value='{$data[$i][0]}' />{$data[$i][1]}&nbsp;&nbsp;&nbsp;&nbsp;";	
		}
	}




	
	
	


	function Select($data){
		for($i = 0; $i < count($data); $i++) {
			echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";	
		}
	}
	
	function Select2($data){
		for($i = 0; $i < count($data); $i++) {
			echo "<option value='{$data[$i][1]}'>{$data[$i][2]}</option>";	
		}
	}
	

	function Selected($data, $id)
	{
		for($i = 0; $i < count($data); $i++) {
			if($data[$i][0] == $id){
				echo "<option selected='selected' value='{$data[$i][0]}'>{$data[$i][1]}</option>";	
			}
			else{
				echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";		
			}
		}
	}
	


	function Selected2($data, $id)
	{
		for($i = 0; $i < count($data); $i++) {
			if($data[$i][1] == $id){
				echo "<option selected='selected' value='{$data[$i][1]}'>{$data[$i][2]}</option>";	
			}
			else{
				echo "<option value='{$data[$i][1]}'>{$data[$i][2]}</option>";		
			}
		}
	}
	

	function Selected_multiple($data, $data2)
	{
		for($i = 0; $i < count($data); $i++) {
			if($data2 == "") {
				echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";
			}else{
				$chk = 0;
				for($j = 0; $j < count($data2); $j++) {
					if($data[$i][0] == $data2[$j][0]) {
						$chk++;	
						break;
					}
				}
				if($chk == 0) {
					echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";	
				}
			}			
		}
	}



	function Selected_multiple2($data, $data2)
	{
		for($i = 0; $i < count($data); $i++) {
			if($data2 == "") {
				echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";
			}else{
				$chk = 0;
				for($j = 0; $j < count($data2); $j++) {
					if($data[$i][0] == $data2[$j][1]) {
						$chk++;	
						break;
					}
				}
				if($chk == 0) {
					echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";	
				}
			}			
		}
	}



/*	function SelectedRemove($data, $data2, $data3)
	{
		for($i = 0; $i < count($data); $i++) {
			if($data2 == "") {
				echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";
			}else{
				$chk = 0;
				for($j = 0; $j < count($data2); $j++) {
					if($data[$i][0] == $data2[$j][0]) {
						$chk++;	
						break;
					}
				}
				if($chk == 0) {
					echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";	
				}
			}			
		}
	}
*/


	function UploadPicture($data) {
		if(($data['name'] != "") && (($data['type'] == "image/jpg") ||
									 ($data['type'] == "image/jpeg") ||
									 ($data['type'] == "image/png") ||
									 ($data['type'] == "image/gif"))) {
			$pic = $data['name'];
			$pic = strtolower(stripslashes($pic));
			if(strlen($pic) > 15) {
				$pic = substr($pic, -15);	
			}
			$pic = rand(1, 999) . time() . $pic;
			$nm = "images/" . $pic;
			copy($data['tmp_name'], $nm);
			return $pic;			
		}
		else {
			$img = "";
			return $img;
		}
		
	}
	
	function CreateFile($data){
		$fn = time() . rand(1, 999999) . ".txt";
		$fnn = "files/" . $fn;
		$fh = fopen($fnn, 'w');
		$fhh = fwrite($fh, $data);
		fclose($fh);
		return $fn;
	}
	
	

	
	
	function FileRead($data) 
	{
		$fn = fopen($data, 'r');
		$dt = fread($fn, filesize($data));
		fclose($fn);
		echo $dt;
	}


	function read_files($file_name, $ln)	{
		$nm = "files/" . $file_name;
		$fh = fopen($nm, "r");
		$dataa = fread($fh, filesize($nm));
		fclose($fh);
		if($ln == "All") {
			echo $dataa;
		}
		else {
			echo substr($dataa, 0, $ln);
		}	
	}


	function UploadDocFile($data) {
		if(($data['name'] != "") && (($data['type'] == "application/msword")
											||
				($data['type']  ==	"application/vnd.openxmlformats-officedocument.wordprocessingml.document")
											||
				($data['type']  ==	"application/octet-stream")
											||
				($data['type'] == "application/pdf")
											||
				($data['type'] == "application/vnd.ms-powerpoint")
											||
				($data['type'] == "application/vnd.openxmlformats-officedocument.presentationml.presentation")				
				)) {
			$pic = $data['name'];
			$pic = strtolower(stripslashes($pic));
			if(strlen($pic) > 15) {
				$pic = substr($pic, -15);	
			}
			$pic = rand(1, 999) . time() . $pic;
			$nm = "largefiles/" . $pic;
			copy($data['tmp_name'], $nm);
			return $pic;			
		}
		else {
			$img = "";
			return $img;
		}
		
	}



	function UploadVideoFile($data) {
		if(($data['name'] != "") && (($data['type'] == "video/x-ms-wmv")
											||
				($data['type']  ==	"video/mp4")
											||
				($data['type']  ==	"application/octet-stream")
											||
				($data['type'] == "video/avi")
											||
				($data['type'] == "video/x-flv")
											||
				($data['type'] == "video/flv"))
				) {
			$pic = $data['name'];
			$pic = strtolower(stripslashes($pic));
			if(strlen($pic) > 15) {
				$pic = substr($pic, -15);	
			}
			$pic = rand(1, 999) . time() . $pic;
			$nm = "video/" . $pic;
			copy($data['tmp_name'], $nm);
			return $pic;			
		}
		else {
			$img = "";
			return $img;
		}
		
	}


	function FileReadReturn($data) 
	{
		$fn = fopen($data, 'r');
		$dt = fread($fn, filesize($data));
		fclose($fn);
		return $dt;
	}


	
	
?>
