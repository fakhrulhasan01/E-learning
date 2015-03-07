<div class="o_container">

	<?php
		$ac = new AcademicQualification();
		$et = new ExamTitle();
	
	
	
/*	
	if(isset($_GET['msg'])){
				echo $_GET['msg'];
	}
	
*/	
	
		
	if(isset($_POST['sub'])){
			$err = 0;
			
			if($_POST['examid'] == 0){
				$err++;
				//echo $err;
				$eexamtitle = "Please select Exam Title";
			}
			if($_POST['institute_name'] == ""){
				$err++;
				//echo $err;
				$einstitute = "Please enter institute name.";
			}else if(strlen($_POST['institute_name'])<4){
				$err++;
				$einstitute = "Invalid institute name. Institute name must be at least 4 characters.";
			}
			if($_POST['result'] == ""){
				$err++;
				$eresult = "Please enter result.";
			}
			if($_POST['passing_year'] == ""){
				$err++;
				$epassingyear = "Please enter passing year.";
			}else if(strlen($_POST['passing_year']) != 4){
				$err++;
				$epassingyear = "Invalid passing year.";
			}
			
			if($err == 0) {
/*				
				$ac->StudentId = $_SESSION['sid'];
				$ac->ExamTitleId = $_POST['id'];
				
*/	/*			$ac->StudentId = $_SESSION['sid'];
				$ac->ExamTitleId = $_POST['examid'];
				$ac->InstituteName = $_POST['institute_name'];
				$ac->Result = $_POST['result'];
				$ac->PassingYear = $_POST['passing_year'];
				if($ac->Update()) {
					$msg .= "Update successfully.";	
				}else{
					$msg .= $ac->Err;
				}
			}
			Redirect("?s=add_a_qualification&ms={$msg}");
		}
	*/	
		$sql = "update academicqualification
						set
							studentid = '".$_SESSION['sid']."',
							examtitleid = '".$_POST['examid']."',
							institutename = '".$_POST['institute_name']."',
							passingyear = '".$_POST['passing_year']."',
							result = '".$_POST['result']."'
						where
							studentid = '".$_SESSION['sid']."' AND
							examtitleid = '".$_POST['id']."'";
							
				if(mysql_query($sql)){
					$msg .= "Update Successful.";
				}else{
					$msg .= mysql_error();
				}
			}
			Redirect("?s=add_a_qualification&msg={$msg}");
		}
				
	
		$ac->StudentId = $_SESSION['sid'];
		$ac->ExamTitleId = $_GET['id'];
		$ac->SelectById();
		
	?>	
	

      <form action="" method="post"  name="myform">  
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <table width="600" border="0" style="margin:0px 0px 0px 40px;">
          <tr> 
          <td colspan="3">
		      <h3>Edit Academic Qualification</h3>
          </td>
          </tr>
         
          <tr>            
            <td><b>Exam Title: </b></td>
            <td>
            <select name="examid">
            <option value="0">Select</option>
            <?php
			Selected($et->Select(), $ac->ExamTitleId);
			?>
            </select>
            </td>
          </tr>
          <tr>            
            <td><b>Institute Name: </b></td>
            <td><input type="text" name="institute_name" value="<?php echo $ac->InstituteName; ?>" /></td>
          </tr>
          
          <tr>            
            <td><b>Result: </b></td>
            <td><input type="text" name="result" value="<?php echo $ac->Result; ?>" /></td>
          </tr>
          
          <tr>            
            <td><b>Passing Year: </b></td>
            <td><input type="text" name="passing_year" value="<?php echo $ac->PassingYear; ?>" /></td>
          </tr>
          
          <tr>            
            <td>&nbsp;</td>
            <td><input type="submit" name="sub" value="Update" /></td>
          </tr>
          
          
        </table>
		</form>    

	
</div>
</div>