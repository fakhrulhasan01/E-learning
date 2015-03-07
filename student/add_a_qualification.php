<div class="o_container">

<?php
$et = new ExamTitle();
$cs = new Course();
$st = new Student();
$ac = new AcademicQualification();
?>


              
              
              
      <?php

		$eexamtitle = "";
		$einstitute = "";
		$eresult = "";
		$epassingyear = "";
		
		
		if(isset($_POST['sub'])){
			$err = 0;
			$msg = "";
			
			
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
			
			if($err == 0){
				$ac->StudentId = $_SESSION['sid'];
				$ac->ExamTitleId = $_POST['examid'];
				$ac->InstituteName = $_POST['institute_name'];
				$ac->Result = $_POST['result'];
				$ac->PassingYear = $_POST['passing_year'];
				
				if($ac->Insert()){
					$msg .= "Insert Successfully.";
				}else{
					$ac->Err;
				}
				Redirect("?s=add_a_qualification&msg={$msg}");

			}
			
		}
				  
	
?>
              
              <br />
<br />

              
      <form action="" method="post"  name="myform">  
        <table width="600" border="0" bgcolor="" style="margin:0px 0px 0px 100px;">
          <tr> 
          <td colspan="4">
          <?php 
		  	if(isset($_GET['msg'])){
				mss($_GET['msg']);
			}
		  ?>
          </td>
          </tr>
          <tr>            
            <td width="110"><b>Exam Title: </b></td>
            <td width="154">
            <select name="examid">
            <option value="0">Select</option>
            <?php
			$ac->StudentId = $_SESSION['sid'];
			Selected_multiple($et->Select(), $ac->Select());
			?>
            </select>
            </td>
            <td width="322"><?php mer($eexamtitle); ?></td>
          </tr>
          
          <tr>            
            <td><b>Institute Name: </b></td>
            <td><input type="text" name="institute_name" /></td>
            <td><?php mer($eexamtitle); ?></td>
          </tr>
          
          <tr>            
            <td><b>Result: </b></td>
            <td><input type="text" name="result" /></td>
            <td><?php mer($eresult); ?></td>
          </tr>
          
          <tr>            
            <td><b>Passing Year: </b></td>
            <td><input type="text" name="passing_year" /></td>
            <td><?php mer($epassingyear); ?></td>
          </tr>
          
          <tr>            
            <td>&nbsp;</td>
            <td><input type="submit" name="sub" value="SAVE" /></td>
          </tr>
          
          
        </table>
  </form>    
<br /><br />


		<h2 style="margin:0px 0px 0px 20px;">Edit/Delete your Academic Qualification</h2><br />

		<table width="600" border="1" style="margin:0px 0px 40px 20px;">
        <tr>
        <th>Exam Title</th>
        <th>Institue Name</th>
        <th>Result</th>
        <th>Passing Year</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        <?php
		$ac->StudentId = $_SESSION['sid'];
		$r = $ac->Select();
		
		if($r != ""){
			for($i=0; $i<count($r); $i++){
				echo "<tr>";
				echo "<td>{$r[$i][1]}</td>";
				echo "<td>{$r[$i][2]}</td>";
				echo "<td>{$r[$i][3]}</td>";
				echo "<td>{$r[$i][4]}</td>";
				echo "<td><a href='?s=a_qualificationedit&id={$r[$i][0]}'>Edit</a></td>";
				echo "<td><a href='?s=a_qualificationdel&id={$r[$i][0]}'>Delete</a></td>";
				echo "</tr>";
			}
		}
        
        ?>
        </table>

</div>
</div>