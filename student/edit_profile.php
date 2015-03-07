<div id="templatemo_image_fader" style="background-color:#E6E6E6; height:auto;">
<h2>View your profile</h2>
<br />
   <div class="templatemo_post">
	<?php
    $dg = new Designation();
	$dp = new Department();
	
	
	
	if(isset($_POST['sub']))
		{
			$err = 0;
			
			if($_POST['name'] == "") {
				$err++;	
				$msg .= $err . ". Please enter name. <br>";	
			}
			if($_POST['dob'] == ""){
				$err++;
				$msg .= $err . ". Please enter date of birth. <br>";
			}
			
				
			if($err == 0) {
				$st->Id = $_SESSION['sid'];
				$st->SelectById();
				if(($_FILES['pic']['name'] != "") && (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($st->Picture != "")
					{
						$stpp = "images/" . $st->Picture;
						unlink($stpp);
					}
					$st->Picture = UploadPicture($_FILES['pic']);
				}
				
				//echo $st->Picture;
				
				$adr = "files/" . $st->Address;
				unlink($adr);
				
				//echo $_POST['opttwo'] . "<br>";
				
				$st->Name = $_POST['name'];
				$st->FatherName = $_POST['fname'];
				$st->MotherName = $_POST['mname'];
				$st->Gender = $_POST['gen'];
				$st->Country = $_POST['cid'];
				$st->Address = CreateFile($_POST['address']);
				$st->DOB = $_POST['dob'];
				
				if($st->Update()){
					$msg .= "Update Successful";	
				}else{
					$msg .= $st->Err;
				}
			}
			//echo $msg;
			Redirect("?s=profile&ms={$msg}");
		}
		$st->Id = $_SESSION['sid'];
		$st->SelectById();
		
	?>

	
	
	
    
    
    
    
    
      <form action="" method="post"  enctype="multipart/form-data">  
			   <table width="452" style="margin:0px 0px 0px 40px;">
                      <tr>
                        <td>&nbsp;</td>
                        <td height="33" colspan="2"><h2>Edit Your Profile</h2></td>
                      </tr>
                      <tr>
                        <td width="52">&nbsp;</td>
                        <td width="135" height="33"><b>Name:</b></td>
                        <td width="249"><input type="text" name="name" value="<?php echo $st->Name; ?>" /></td>
                      </tr>

                      <tr>
                        <td width="52">&nbsp;</td>
                        <td width="135" height="33"><b>Father's Name:</b></td>
                        <td width="249"><input type="text" name="fname" value="<?php echo $st->FatherName; ?>" /></td>
                      </tr>

                      <tr>
                        <td width="52">&nbsp;</td>
                        <td width="135" height="33"><b>Mother's Name:</b></td>
                        <td width="249"><input type="text" name="mname" value="<?php echo $st->MotherName; ?>" /></td>
                      </tr>


                      <tr>
                        <td width="108">&nbsp;</td>
                        <td width="108" height="33"><b>Gender:</b></td>
                        <td width="218">
                        <?php
                        if($st->Gender == "M"){
						?>
                        <select name="gen">
                        	<option value="M" selected="selected">Male</option>
                            <option value="F">Female</option>
                        </select>
                        <?php }else{?>

                        <select name="gen">
                            <option value="M">Male</option>
                        	<option value="F" selected="selected">Female</option>
                        </select>
                        
                        <?php }?>
                        </td>
                      </tr>

                      <tr>
                        <td>&nbsp;</td>
                        <td height="32"><b>Country:</b></td>
                        <td>
                        <select name="cid">
                        <option value="b">Bangladesh</option>
                        </select>
                        </td>
                      </tr> 
                       <tr>
                         <td>&nbsp;</td>
                        <td height="105"><b>Address:</b></td>
                        <td><textarea name="address"><?php FileRead("files/" . $st->Address); ?></textarea></td>
                      </tr>  
                      
                      <tr>
                        <td width="52">&nbsp;</td>
                        <td width="135" height="33"><b>Date of Birth:</b></td>
                        <td width="249"><input type="text" name="dob" value="<?php echo $st->DOB; ?>" /></td>
                      </tr>
                      
                      <tr>
                         <td height="35">&nbsp;</td>
                        <td><b>Picture:</b></td>
                         <td>
							 <img style="margin:10px 0px 0px 60px;" src="images/<?php echo $st->Picture; ?>" height="100" width="100" />	
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
