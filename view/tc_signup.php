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
		
				$("#tcEmail").keyup(function(){
					//alert("Hi");
					var tcEmail = $(this).val();
					$.post('view/checkAvailableEmails.php', {tcEmail: tcEmail}, function(data){
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


<?php
$dg = new Designation();
$dp = new Department();
$tc = new Teacher();
?>


		<div id="templatemo_content_area">
			
			<style type="text/css">
            .templatemo_post td{
                color:#333; font-family:"Times New Roman", Times, serif; font-size:14px;
            }
            </style>
            
        	<div id="templatemo_left">
              <div class="templatemo_post">
              
              
              
				  <?php
                  
                  
                  $ename = "";
                  $eemail = "";
                  $epass = "";
                  $egen = "";
                  $eaddress = "";
                  $edesignation = "";
                  $edepartment = "";
				  $esecurity = "";
                  
				  
				  $name = "";
				  $email = "";
				  $address = "";
				  $err = 0;
            
                    if(isset($_POST['sub'])){
						
						$name = $_POST['name'];
						$email = $_POST['email'];
						$address = $_POST['address'];
                        
                        if($_POST['name'] == "") {
                            $err++;	
                            $ename .= "Please enter name. ";	
                        }
                        else if(strlen($_POST['name'])<3){
                            $err++;
                            $ename .= "Name must be at least 3 characters.";
                        }
                        if($_POST['email'] == ""){
                            $err++;
                            $eemail .= "Please enter email";
                        }
						else{
						$tc->Email = $_POST['email'];
						$r = $tc->Select();
						if($r != ""){
							$err++;
							$eemail = "This email is already exist.";
						}
					}
						
                        if(strlen($_POST['pass']) < 6){
                            $err++;
                            $epass .=  "Password length must be at least 6 characters";
                        }
                        else if($_POST['pass'] != $_POST['pass1']){
                            $err++;
                            $epass .= "Password do not match. <br>";
                        }
                        if($_POST['address'] == ""){
                            $err++;
                            $eaddress = "Please enter your address.";
                        }
                        else if(strlen($_POST['address']) < 6){
                            $err++;
                            $eaddress = "Address must be at least 6 characters.";
                        }
						if($_POST['gen'] == ""){
							$err++;
							$egen = "Please select gender";
						}
                        if($_POST['dgid'] == 0){
                            $err++;
                            $edesignation = "Please select your designation.";
                        }
                        if($_POST['deptid'] == 0){
                            $err++;
                            $edepartment = "Please select your department.";
                        }
						if($_POST['security'] != "rujaitmi"){
							$err++;
							$esecurity = "Please enter correct security code";
						}
						
		if($err == 0) {	
			if(preg_match("/^([A-Za-z0-9_-]+)(\.[A-Za-z0-9_-]+)*@([A-Za-z0-9_-]\.)*([A-Za-z0-9_-]+)\.[A-Za-z]{2,}$/i", $_POST['email'])){
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
            
							   
                            $msg = "";
                            $tc->Name = $_POST['name'];
                            $tc->Email = $_POST['email'];
                            $tc->Password = $_POST['pass'];
                            $tc->Country = $_POST['cid'];
                            $tc->Address = CreateFile($_POST['address']);
                            $tc->Gender = $_POST['gen'];
                            $tc->DesignationId = $_POST['dgid'];
                            $tc->DepartmentId = $_POST['deptid'];
                            $tc->Picture = UploadPicture($_FILES['pic']);
                            $tc->Verification = $veri;
            
                            if($tc->Insert()) {
                                $to = MS($_POST['email']);
                                $sub = "Mail verification for SWE E-learning";
								$msg .= "You are registered successfully and a confirmation message has been sent to your email.";	
								$mmsg = "To verify please click on http://www.swe-elearning.com/?p=verifyteacher&ver=".$veri;
                                       				
								$tc->Email = $email;
								//$tc->Password = $_POST['pass'];
								$tc->SelectByEmail();
								$_SESSION['tid'] = $tc->Id;
		                        Redirect("?t=welcome&ms={$msg}");
								mail($to, $sub, $mmsg);
                             }else{
                                $msg .= $tc->Err;
                            }
						}else{
						$eemail = "Your email is not correct.";
						}
                   }
                }
                              
                
            ?>
                          
                          
                          
                  <form action="" method="post"  enctype="multipart/form-data">  
                           <table width="628" style="margin:0px 0px 0px 40px;">
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td height="33" colspan="2"><h2>Teacher Registration</h2></td>
                                  </tr>
                                  <tr>
                                    <td width="10">&nbsp;</td>
                                    <td width="93" height="33"><b>Name:</b></td>
                                    <td width="218"><input type="text" name="name" value="<?php echo $name; ?>" /></td>
                                    <td width="287"><?php mer($ename); ?></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td height="39"><b>Email:</b></td>
                                    <td><input type="text" id="tcEmail" name="email" value="<?php echo $email; ?>" /></td>            
                                    <td width="287" id="show"><?php mer($eemail); ?></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td height="35"><b>Password:</b></td>
                                    <td><input type="password" name="pass" /></td>
                                    <td width="287"><?php mer($epass); ?></td>
                                  </tr>  
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td height="50"><b>Retype Password:</b></td>
                                    <td><input type="password" name="pass1" /></td>
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
                                    <td height="42"><b>Gender:</b></td>
                                    <td>
                                    <select name="gen">
                                    <option value="">Select Sex</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    </select>
                                    </td>
                                    <td width="287"><?php mer($egen); ?></td>
                                   </tr>  
                                  
                                   <tr>
                                     <td>&nbsp;</td>
                                    <td height="105"><b>Address:</b></td>
                                    <td><textarea name="address"><?php echo $address; ?></textarea></td>
                                    <td width="287"><?php mer($eaddress); ?></td>
                                  </tr>  
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td height="59"><b>Designation:</b></td>
                                    <td>
                                    <select name="dgid">
                                    <option value="0">Select One</option>
                                    <?php Select($dg->Select()); ?>
                                    </select>
                                    </td>
                                    <td width="287"><?php mer($edesignation); ?></td>
                                  </tr>
                                  
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td height="56"><b>Deparmtent:</b></td>
                                    <td>
                                    <select name="deptid">
                                    <option value="0">Select One</option>
                                    <?php Select($dp->Select()); ?>
                                    </select>
                                    </td>
                                    <td width="287"><?php mer($edepartment); ?></td>
                                  </tr>
                                  
                                  <tr>
                                     <td height="47">&nbsp;</td>
                                    <td><b>Picture:</b></td>
                                     <td><input type="file" name="pic"  /></td>
                                    <td width="287"></td>
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
                                     <td><input style="width:100px; background-color:#D6D6D6; height:24px; margin:0px 0px 0px 76px;" type="submit" name="sub" value="Register"/></td>
                                    <td width="287"></td>
                                  </tr>
            </table>
                            </form>
            
                          </div>
                            
                        </div><!-- End Of left-->
                        
                        
                        
                        
                        
                        
            <div id="templatemo_right" style="margin-top:0px;">
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
