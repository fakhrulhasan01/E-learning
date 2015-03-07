<style type="text/css">
	.loginSection{
		width:300px; height:30px; background-color:#000;
	}
	#student{
		float:left;
		position:relative;
		height:25px; width:47.5%; font-size:14px; font-weight:bold; padding:5px 0px 0px 2%; border-top:1px #CCC solid; 
		border-left:1px #CCC solid;
		background-color:#F7F7F7; cursor:pointer;
	}
	#teacher{
		float:right;
		position:relative;
		height:25px; width:47.5%; font-size:14px; font-weight:bold; padding:5px 0px 0px 2%; border-top:1px #999 solid; 
		border-right:1px #999 solid; color:#009900;
		background-color:#E9E9E9; cursor:pointer;
	}
	
	#txtMain{
		float:left; font-size:13px; position:relative; color:#000; margin-right:-5px;
	}
	
	#txtLeft{
		float:left; font-size:12px; position:relative; color:#06C; margin-right:-5px; text-decoration:underline;
	}
	#txtRight{
		float:left; font-size:12px; position:relative; color:#06C; margin-right:16px; text-decoration:underline;
	}
	
	#studentLogin{
		padding:0px; margin:0px 0px 0px 0px; width:298px; height:178px; border:1px #CCC solid; background-color:#F7F7F7; 
	}
	
	#teacherLogin{
		padding:0px; margin:0px 0px 0px 0px; width:298px; height:178px; border:1px #999 solid; background-color:#E9E9E9; color:#363636; display:none;
	}
	
	#studentLogin table, #teacherLogin table{
		position:absolute;
	}
	
	.txtColor{
		color:#0CF;
	}
	
	#txtInput{
		width:260px; margin-left:10px; height:30px; border-radius:10px; border:1px #009900 solid;
	}
	
	#btn{
		float:right; width:60%; height:30px; border:1px #009900 solid; border-radius:10px; background-color: #009900; color:#FFF; font-weight:bold; font-size:18px; cursor:pointer;
	}
	
	#txtInputSt{
		width:260px; margin-left:10px; height:30px; border-radius:10px; border:1px #696969 solid;
	}
	

	#btnSt{
		float:right; width:60%; height:30px; border:1px #696969 solid; border-radius:10px; background-color: #696969; color:#FFF; font-weight:bold; font-size:18px; cursor:pointer;
	}	
</style>
<script type="text/javascript" src="../js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function(){


				$("#stEmail").keyup(function(){
					//alert("Hi");
					var stEmail = $(this).val();
					$.post('view/checkAvailableEmails.php', {stEmail: stEmail}, function(data){
						$("#show").html(data);
					});
				});
		
		
	<?php 
		if(isset($_GET['msgtc'])){
	?>
			$("#studentLogin").hide();
			$("#teacherLogin").fadeIn();
			
			
			$("#teacher").click(function(){
				$("#studentLogin").hide();
				$("#teacherLogin").fadeIn();
			});
			
			$("#student").click(function(){
				$("#teacherLogin").hide();
				$("#studentLogin").fadeIn();
			});
			
	<?php }else{?>
		$("#teacher").click(function(){
			$("#studentLogin").hide();
			$("#teacherLogin").fadeIn();
		});
		
		$("#student").click(function(){
			$("#teacherLogin").hide();
			$("#studentLogin").fadeIn();
		});
	<?php }?>	
	});
</script>



<div id="templatemo_content_area">
<style type="text/css">
.templatemo_post td{
	color:#333; font-family:"Times New Roman", Times, serif; font-size:14px;
}
</style>
 <div id="templatemo_left">
   <div class="templatemo_post">
		<?php
		
		
			$et = new ExamTitle();
			$cs = new Course();
			$st = new Student();
			$ct = new CourseTeacher();
			$err = 0;
			$msg = "";			
			

		
      ?>





        

 <script>
function catsub(data){		
	data.subcategoryid.length = 0;
//	alert(3);
	if(data.categoryid.options[data.categoryid.selectedIndex].value == 0) {
		data.subcategoryid.options[data.subcategoryid.length] = new Option("Select Category First fd", 0);
	}
		<?php
		$r = $cs->Select();
		for($i=0; $i<count($r); $i++){
		?>
	else if(data.categoryid.options[data.categoryid.selectedIndex].value == <?php echo $r[$i][0]; ?>) {
		<?php
	  	$ct->CourseId = $r[$i][0];
		$rr = $ct->Select();
		if($rr != ""){
			for($j=0; $j<count($rr); $j++) {
		?>
		data.subcategoryid.options[data.subcategoryid.length] = new Option("<?php echo $rr[$j][3]; ?>", <?php echo $rr[$j][0]; ?>);
		<?php
			}
			}
		?>
		}
	<?php
		}
	?>
	}
</script>    





<?php 
			$ename = "";
			$eemail = "";
			$epass = "";
			$efname = "";
			$emname = "";
			$egender = "";
			$eaddress = "";
			$edate = "";
			$ecourse = "";
			$eteacher = "";
			$esecurity = "";
			
			$name = "";
			$email = "";
			$pass = "";
			$fname = "";
			$mname = "";
			$gender = "";
			$address = "";
			$dob = "";
			$course = "";
			$teacher = "";
			
			
			

		
		if(isset($_POST['sub'])){
			
				$name = $_POST['name'];
				$email = $_POST['email'];
				$pass = $_POST['name'];
				$fname = $_POST['fname'];
				$mname = $_POST['mname'];
				$address = $_POST['address'];
				$dob = $_POST['ftime'];
				
				
				//Checking if some one taken same email address to register
				$st->Email = $email;
				$st->SelectByStatus();
				
			if($_POST['name'] == "") {
				$err++;	
				$ename .= "Please enter name. ";	
			}
			else if(strlen($_POST['name'])<2){
				$err++;
				$ename .= "Name must be at least 3 characters.";
			}
			if($_POST['email'] == ""){
				$err++;
				$eemail = "Please enter email.";
			}else if($st->Name != ""){
				$err++;
				$eemail = "This email is already registered.";
			}
			if(strlen($_POST['pass']) < 6){
				$err++;
				$epass .=  "Password length must be at least 6 characters.";
			}
			else if($_POST['pass'] != $_POST['pass1']){
				$err++;
				$epass .= "Password do not match. <br>";
			}
			if($_POST['fname'] == "") {
				$err++;	
				$efname .= "Please enter father's name. ";	
			}
			else if(strlen($_POST['fname'])<2){
				$err++;
				$efname .= "Name must be at least 2 characters.";
			}
				
			if($_POST['mname'] == "") {
				$err++;	
				$emname .= "Please enter mother's name.";	
			}
			else if(strlen($_POST['mname'])<2){
				$err++;
				$emname .= "Name must be at least 2 characters.";
			}
			if($_POST['ftime'] == ""){
				$err++;
				$edate .= "Invalid date.";
			}
			if(strlen($_POST['address']) == ""){
				$err++;
				$eaddress .= "Please Enter address.";
			}
			else if(strlen($_POST['address'])<3){
				$err++;
				$edate .= "Address must be at least 3 characters.";
			}
			if($_POST['gen'] == ""){
				$err++;
				$egender = "Please select gender.";
			}
			if($_POST['categoryid'] == 0){
				$err++;
				$ecourse = "Please select a course.";
			}
			if($_POST['subcategoryid'] == 0){
				$err++;
				$eteacher = "Please select your teacher.";
			}
			if($_POST['security'] != "0132"){
				$err++;
				$esecurity = "Please enter correct security code";
			}
			
			
			
			if($err == 0) {
				if(preg_match("/^([A-Za-z0-9_-]+)(\.[A-Za-z0-9_-]+)*@([A-Za-z0-9_-]\.)*([A-Za-z0-9_-]+)\.[A-Za-z]{2,}$/i", $email)){
				$a = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R",
							"S","T","U","v","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j", 
							"k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1",
							"2","3","4","5","6","7","8","9", "!", "@"); 
				$veri = "";
				for($i = 1; $i <= 15; $i++) {
					//$n = rand(0, count($a)-1);	
					//$veri .= $a[$n];
					$veri .= $a[rand(0, count($a)-1)];
				}					
					$date1 = $_POST['ftime'];
					$date1 = date('Y-m-d', strtotime($date1));
					//echo $date1 . "<br />";
			
					$st->Name = $_POST['name'];
					$st->Email = $_POST['email'];
					$st->Password = $_POST['pass'];
					$st->FatherName = $_POST['fname'];
					$st->MotherName = $_POST['mname'];
					$st->Gender = $_POST['gen'];
					$st->Country = $_POST['cid'];
					$st->Address = CreateFile($_POST['address']);
					$st->JoinDate = $_POST['jdate'];
					$st->DOB = $date1;
					$st->CourseId = $_POST['categoryid'];
					$st->TeacherId = $_POST['subcategoryid'];
					$st->Picture = UploadPicture($_FILES['pic']);
					$st->Verification = $veri;
	
					if($st->Insert()) {
						$to = MS($_POST['email']);
						$sub = "Mail verification for Daffodil E-learning";
						$ms = "Thanks for using our service.<br> 
								For active your account, please click on the following link <br>
								http://www.swe-elearning.com/?p=verification&ver=".$veri;
						$msg .= "Registered Successfully. Please check your email. a verification message has been sent to your email.";
						$st->Verification = $veri;
						echo $veri . "<br />";
						$st->SelectByVerification();
						$_SESSION['sid'] = $st->Id;
								echo $ms . "<br />";
								echo $st->Id . "<br />";
						mail($to, $sub, $ms); 					
						
						Redirect("?s=welcome&ms={$msg}");
					}else{
					$msg .= $st->Err;
					}
					
				}else{//
					$eemail = "Please enter a valid email";
				}
			}//end of email checking condition
			
		}
              
      ?>













              
              
      	<form action="" method="post"  enctype="multipart/form-data" name="myForm">  
        	
            <input type="hidden" name="data" value="" />
			<table width="764" style="margin:0px 0px 0px 40px;">
                      <tr>
                        <td>&nbsp;</td>
                        <td height="33" colspan="2"><h2>Student Registration</h2></td>
                      </tr>
                      <tr>
                        <td width="10">&nbsp;</td>
                        <td width="112" height="33"><b>Name:</b></td>
                        <td width="229"><input type="text" name="name" value="<?php echo $name; ?>" /></td>
                        <td width="393"><?php mer($ename); ?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="39"><b>Email:</b></td>
                        <td><input type="text" id="stEmail" name="email" value="<?php echo $email; ?>" /></td>
                        <td width="393" id="show"><?php mer($eemail); ?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><b>Password:</b></td>
                        <td><input type="password" name="pass" /></td>
                        <td width="393"><?php mer($epass); ?></td>
                      </tr>  
                      <tr>
                        <td>&nbsp;</td>
                        <td height="48"><b>Retype Password:</b></td>
                        <td><input type="password" name="pass1" /></td>
                        <td width="393">&nbsp;</td>
                      </tr>  
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><b>Father's Name:</b></td>
                        <td><input type="text" name="fname" value="<?php echo $fname; ?>" /></td>
                        <td width="393"><?php mer($efname); ?></td>
                      </tr>  

                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><b>Mother's Name:</b></td>
                        <td><input type="text" name="mname" value="<?php echo $mname; ?>" /></td>
                        <td width="393"><?php mer($emname); ?></td>
                      </tr>  

                      <tr>
                        <td>&nbsp;</td>
                        <td height="42"><b>Gender:</b></td>
                        <td>
                        <select name="gen">
                        <option value="">Select Sex</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        </select>
                        </td>
                        <td width="393"><?php mer($egender); ?></td>
                      </tr>  
                      
                      <tr>
                        <td>&nbsp;</td>
                        <td height="42"><b>Country:</b></td>
                        <td><select name="cid">
                          <option value="b">Bangladesh</option>
                        </select></td>
                        <td width="393">&nbsp;</td>
                      </tr> 
                      
                      
                      <tr>
                        <td>&nbsp;</td>
                        <td height="105"><b>Address:</b></td>
                        <td><textarea name="address"><?php echo $address; ?></textarea></td>
                        <td width="393"><?php mer($eaddress); ?></td>
                      </tr>  
                      <tr>
                        <td>&nbsp;</td>
                        <td height="39"><b>Join Date:</b></td>
                        <td><input type="text" name="jdate" value="<?php echo date("Y/m/d"); ?>" readonly="readonly" /></td>
                        <td width="393">&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                        <td height="41"><b>Date of Birth:</b></td>
                        <td><input type="Text" name="ftime" readonly="readonly" value="<?php echo $dob; ?>" id="demo1" maxlength="25" size="25"><a href="javascript:NewCal('demo1','ddmmmyyyy',true,24)"><img src="img/cal.gif" width="30" height="20" border="0" alt="Pick a date"></td>
                        <td width="393"><?php mer($edate); ?></td>
                      </tr>

				
                       <tr>
                        <td height="39">&nbsp;</td>
                        <td><b>Course Name:</b></td>
                        <td><select name="categoryid" class="contact_select" onchange="catsub(document.myForm);">
                                <option value="0">Select Course......</option>
                                <?php
									Select($cs->Select());
                                ?>
                            </select>
                        </td>
                        <td width="393"><?php mer($ecourse); ?></td>
                        </tr>
                        <tr>
                           <td height="41">&nbsp;</td>
                           <td><b>Course Teacher</b></td>
                           <td>
                                <select name="subcategoryid" id="subcategoryid" class="contact_select">
                                <option value="0">Select a course first....</option>
                                </select>
                            </td> 
	                        <td width="393"><?php mer($eteacher); ?></td>
                         </tr>
                        <tr>
                            <td height="42"></td>
                            <td><b>Picture</b></td>
                            <td><input type="file" name="pic" /></td>
	                        <td width="393"></td>
                        </tr>
                        <tr>
                            <td height="42"></td>
                            <td><b>Security Code</b></td>
                            <td><input type="password" name="security" /></td>
	                        <td width="393"><?php mer($esecurity); ?></td>
                        </tr>
                      <tr>
                         <td height="37">&nbsp;</td>
                        <td></td>
                         <td><input style="width:100px; background-color:#D6D6D6; height:24px; margin:0px 0px 0px 76px;" type="submit" name="sub" value="Register"  /></td>
                      </tr>
                </table>
                </form>

              </div>
                
            </div><!-- End Of left-->
            
            
            
            
            
            <div id="templatemo_right">
            	<div class="templatemo_section">
			<?php require_once("show_teacher.php"); ?>               
                <?php 
				if(isset($_SESSION['sid']) || isset($_SESSION['tid']) || isset($_SESSION['id'])){
					}else{
				?>
                	<div class="loginSection" id="con">
                    	<p id="student">Student Login</p><p id="teacher">Teacher Login</p>
                    </div>
                    <div id="studentLogin">
           	                    <form action="?p=check" method="post">
                                    <table width="280" border="0" bgcolor="#F7F7F7" id="tbl">
                                      <tr>
                                        <td colspan="2">
                                        <span style="color:green; font-size:13px"><?php if(isset($_GET['msg'])){echo $_GET['msg']; } ?></span>
                                        <span style="color:#F30; font-size:13px"><?php if(isset($_GET['msgst'])){echo $_GET['msgst']; } ?></span>                                                
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2"><input id="txtInputSt" placeholder="Enter your email" type="text" name="st_email" /></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2"><input id="txtInputSt" placeholder="Enter your password" type="password" name="st_password" /></td>
                                      </tr>
                                      <tr>
                                        
                                        <td colspan="2"><input id="btnSt" type="submit" name="student_login" value="Login" /></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2"><font style="float:right; padding-right:20px;" id="txtMain">If you have no account</font><br />
                                                   <a id="txtLeft" style="float:right; padding-right:20px;" href="?p=st_signup">Create new account</a>		
                                                   <a id="txtRight" style="float:right; padding-right:20px;" href="?p=recover_account_st">Forgot Password</a></td>
                                      </tr>
                                    </table>
                                    </form>
                                    <br />
                    </div>
                    
                    <div id="teacherLogin">
                                <form action="?p=check" method="post">
                                <table width="280" border="0">
                                  <tr>
                                    <td colspan="2">
                                    <span style="color:green; font-size:13px"><?php if(isset($_GET['msg'])){echo $_GET['msg']; } ?></span>
                                    <span style="color:#F30; font-size:13px"><?php if(isset($_GET['msgtc'])){echo $_GET['msgtc']; } ?></span>                        
                                    </td>
                                  </tr>
                                  <tr>
                                    
                                    <td colspan="2"><input type="text" id="txtInput" placeholder="Enter your email" name="tc_email" /></td>
                                  </tr>
                                  <tr>

                                    <td colspan="2"><input type="password" id="txtInput" placeholder="Enter your password" name="tc_password" /></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><input id="btn" type="submit" name="teacher_login" value="Login" /></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2"><font style="float:right; padding-right:20px;" id="txtMain">If you have no account</font><br />
                                                    <a id="txtLeft" style="float:right; padding-right:20px;" href="?p=tc_signup">Create new account</a>
                                                    <a id="txtRight" style="float:right;  padding-right:20px;" href="?p=recover_account_tc">Forgot Password</a>
                                                    </td>
                                  </tr>
                                </table>
                                </form>
						<br />
					</div>                    
                    <?php }?>
				</div>
                    
                    
            
            <div class="cleaner"></div>
        
        </div><!-- End Of Content area -->
    </div><!-- End Of Container -->




