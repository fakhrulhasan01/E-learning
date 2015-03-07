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
		<div id="templatemo_image_fader" style="width:620px">
        	 <script type="text/javascript">
			 
var fadeimages=new Array()
//SET IMAGE PATHS. Extend or contract array as needed
<?php 
$ss = new SlideShow();
$r = $ss->Select();
for($i=0; $i<count($r); $i++){
	
?>
fadeimages[<?php echo $i; ?>]=["images/<?php echo $r[$i][1]; ?>", "", ""] //plain image syntax
<?php }?>

 
var fadebgcolor="white"


//new fadeshow(IMAGES_ARRAY_NAME, slideshow_width, slideshow_height, borderwidth, delay, pause (0=no, 1=yes), optionalRandomOrder)
new fadeshow(fadeimages, 600, 240, 0, 2000, 1, "R")
 
			</script>
        </div>
        		
<?php
//Redirect("?p=home#templatemo_menu"); 
include_once("common_part.php"); 
?>

            <div id="templatemo_right" style="margin-top:-270px;">
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
                    
               
            
`            <div class="cleaner"></div>
        
        </div><!-- End Of Content area -->
    </div><!-- End Of Container -->
