<div id="templatemo_image_fader" style="background-color:#F4F4F4; height:auto;">
<br />
   <div class="templatemo_post">
	<?php
    $dg = new Designation();
	$dp = new Department();
	
	
	$ename = "";
	$eaddress = "";
	$edesignation = "";
	$edepartment = "";
	
	
	if(isset($_POST['sub']))
		{
			$err = 0;
			
			if($_POST['name'] == "") {
				$err++;	
				$ename = "Please enter name.";
			}
			if($_POST['address'] == ""){
				$err++;
				$eaddress = "Please enter address.";
			}else if(strlen($_POST['address'])<8){
				$err++;
				$eaddress = "Address must be at least 8 characters.";
			}
			if($_POST['dgid'] == 0){
				$err++;
				$edesignation = "Please select desingation.";
			}
			if($_POST['deptid'] == 0){
				$err++;
				$edepartment = "Please select department.";
			}
				
			if($err == 0) {
				$tc->Id = $_SESSION['tid'];
				$tc->SelectById();
				if(($_FILES['pic']['name'] != "") && (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($tc->Picture != "")
					{
						$tcpp = "images/" . $tc->Picture;
						unlink($tcpp);
					}
					$tc->Picture = UploadPicture($_FILES['pic']);
				}
				
				//echo $tc->Picture;
				
				$adr = "files/" . $tc->Address;
				unlink($adr);
				
				//echo $_POST['opttwo'] . "<br>";
				
				$tc->Name = $_POST['name'];
				$tc->Country = $_POST['cid'];
				$tc->Address = CreateFile($_POST['address']);
				$tc->DesignationId = $_POST['dgid'];				
				$tc->DepartmentId = $_POST['deptid'];
				
				
				if($tc->Update()) {
					$msg .= "Update Successful";	
				}else{
					$msg .= $tc->Err;
				}
			}
			//echo $msg;
			Redirect("?t=profile&msg={$msg}");
		}
		$tc->Id = $_SESSION['tid'];
		$tc->SelectById();
		
	?>

	
	
	
    
    
    
    
    
      <form action="" method="post"  enctype="multipart/form-data">  
			   <table width="452" style="margin:0px 0px 0px 40px;">
                      <tr>
                        <td>&nbsp;</td>
                        <td height="33" colspan="3"><h2>Edit Your Profile</h2></td>
                      </tr>
                      <tr>
                        <td width="108">&nbsp;</td>
                        <td width="108" height="33"><b>Name:</b></td>
                        <td width="218"><input type="text" name="name" value="<?php echo $tc->Name; ?>" /></td>
                        <td><?php mer($ename); ?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="32"><b>Country:</b></td>
                        <td>
                        <select name="cid">
                        <option value="b">Bangladesh</option>
                        </select>
                        </td>
                        <td></td>
                      </tr> 
                       <tr>
                        <td>&nbsp;</td>
                        <td height="105"><b>Address:</b></td>
                        <td><textarea name="address"><?php FileRead("files/" . $tc->Address); ?></textarea></td>
                        <td><?php mer($eaddress); ?></td>
                      </tr>  
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><b>Designation:</b></td>
                        <td>
                        <select name="dgid">
                        <option value="0">Select One</option>
						<?php Selected($dg->Select(), $tc->DesignationId); ?>
                        </select>
                        </td>
                        <td><?php mer($edesignation); ?></td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><b>Deparmtent:</b></td>
                        <td>
                        <select name="deptid">
                        <option value="0">Select One</option>
						<?php Selected($dp->Select(), $tc->DepartmentId); ?>
                        </select>
                        </td>
                        <td><?php mer($edepartment); ?></td>
                      </tr>
                      
                      <tr>
                         <td height="35">&nbsp;</td>
                        <td><b>Picture:</b></td>
                         <td>
							 <img style="margin:10px 0px 0px 60px;" src="images/<?php echo $tc->Picture; ?>" height="100" width="100" />	
                             <input type="file" name="pic"  /><br />
                         </td>
                      </tr>
                      <tr>
                         <td height="37">&nbsp;</td>
                        <td></td>
                         <td><input style="width:100px; background-color:#D6D6D6; height:24px; margin:0px 0px 0px 76px;" type="submit" name="sub" value="Change"  /></td>
                      </tr>
                </table>
        </form>
      </div>

</div>
</div>