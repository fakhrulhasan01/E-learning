<style type="text/css">
table{
	font-family:Verdana, Geneva, sans-serif; color:#666;
}
</style>
<div id="templatemo_image_fader" style="background-color:#F4F4F4; height:auto;">
<?php
	//$tc = new Teacher();
	
	$err = 0;
	$eopass = "";
	$enpass = "";
	
	$msg = "";
	
	
	if(isset($_POST['sub'])){
		$tc->SelectById();
		if($_POST['o_pass'] != $tc->Password){
			$err++;
			$eopass = "Your old password does not match.";
		}
		if(strlen($_POST['n_pass'])<6){
			$err++;
			$enpass = "Password length must be at least 6 characters.";
		}
		
		if($err == 0){
			$tc->Password = $_POST['n_pass'];
			if($tc->Update()){
				$msg = "Password changed successfully.";
			}
		}
	}
	
?>



		<form action="" method="post">
     		<table width="789" style="margin:20px 0px 20px 40px;">
                      <tr>
                      	<td height="60"></td>
                      	<td colspan="3"><br />
                        <?php mss($msg); ?><br />
                   		<font style="color:#666; font-size:16px">Change your password</font></td>
       				  </tr>
					  <tr>
                        <td width="105">&nbsp;</td>
                        <td width="151" height="24"><b>Your Email:</b></td>
                        <td width="144"><input type="text" name="email" placeholder="<?php echo $tc->Email; ?>" /></td>
          				<td width="369">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><b>Enter old password:</b></td>
                        <td><input type="password" name="o_pass" /></td>
                        <td><?php mer($eopass); ?></td>
                      </tr>  
                       <tr>
                         <td>&nbsp;</td>
                        <td height="42"><b>Enter new passoword:</b></td>
                        <td><input type="password" name="n_pass" /></td>
                        <td><?php mer($enpass); ?></td>
                      </tr>  
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"></td>
                        <td><input type="submit" name="sub" value="Change" /></td>
                        <td>&nbsp;</td>
                      </tr>
                </table>
  </form>


</div>
</div>