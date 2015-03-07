        		
<?php include_once("common_part.php"); ?>
<!-- End Of left-->
            
            <div id="templatemo_right">
            	<div class="templatemo_section">
                <?php 
				if(isset($_SESSION['tid']) || isset($_SESSION['sid'])){
				?>
	               	<div class="templatemo_section_title">
                    	Logout
                    </div>
                    <div class="templatemo_section_bottom">
                    <h3><a href="?p=logout">Logout</a></h3>
                    </div>
                <?php } else{?>
                
                	<div class="templatemo_section_title">
                    	Teacher Login
                    </div>
                    <div class="templatemo_section_bottom">
                    <form action="?p=check" method="post">
                    <table width="280" border="0">
                      <tr>
                        <td colspan="2">
                        <h4 style="color:green;"><?php if(isset($_GET['msg'])){echo $_GET['msg']; } ?></h4>
						<h4 style="color:red;"><?php if(isset($_GET['msgg'])){echo $_GET['msgg']; } ?></h4>                        
                        </td>
                      </tr>
                      <tr>
                        <td><b>Email:</b></td>
                        <td><input type="text" name="tc_email" /></td>
                      </tr>
                      <tr>
                        <td><b>Password:</b></td>
                        <td><input type="password" name="tc_password" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="teacher_login" value="Login" /></td>
                      </tr>
                      <tr>
                        <td colspan="2"><font style="float:right; padding-right:20px;">If you have no account</font><br />
										<a style="float:right; padding-right:20px;" href="?p=tc_signup">Create new account</a>
                                        <a style="float:right; padding-right:20px;" href="?p=recover_account_tc">Forgot Password</a>
                                        </td>
                      </tr>
                    </table>
					</form>
                    
                    </div>
                    <?php }?>
				</div>
                    
			<?php require_once("show_teacher.php"); ?>               
            
            <div class="cleaner"></div>
        
        </div><!-- End Of Content area -->
    </div><!-- End Of Container -->
