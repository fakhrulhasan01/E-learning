<style type="text/css">
table{
	font-family:Verdana, Geneva, sans-serif; color:#666;
}
</style>
<div id="templatemo_image_fader" style="background-color:#F4F4F4; height:auto;">
<?php
	//$tc = new Teacher();
	$st = new Student();
	$err = 0;
	$eopass = "";
	$enpass = "";
	
	$msg = "";
	$email = "";
	$eemail = "";
	
	if(isset($_POST['sub'])){
		$email = $_POST['email'];
		if(preg_match("/^([A-Za-z0-9_-]+)(\.[A-Za-z0-9_-]+)*@([A-Za-z0-9_-]\.)*([A-Za-z0-9_-]+)\.[A-Za-z]{2,}$/i", $email)){
			$st->Email = $email;
			//echo $st->Id;
			$st->SelectByEmail();
			if($st->Name != ""){
				$st->Id;
				//$eemail = "";
					$a = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R",
								"S","T","U","v","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j", 
								"k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1",
								"2","3","4","5","6","7","8","9"); 
					$rpass = "";
					for($i = 1; $i <= 8; $i++) {
						//$n = rand(0, count($a)-1);	
						//$veri .= $a[$n];
						$rpass .= $a[rand(0, count($a)-1)];
					}
					$to = $email;
					$sub = "MR. ".$st->Name.", someone request from your account to change password";
					$ms = "Your new password: ".$rpass;
					mail($to, $sub, $ms);
					$st->Password = $rpass;
					$st->Update();
					$msg = "A new password has been sent to your mail";
			}else{
				$eemail = "This email id is not exist";
			}
		}else{
			$eemail = "Incorrect email";
		}
	}
	
?>



		<form action="" method="post">
     		<table width="789" style="margin:20px 0px 20px 40px;">
                      <tr>
                      	<td height="60"></td>
                      	<td colspan="3"><br />
                        <?php mss($msg); ?><br />
                   		<font style="color:#666; font-size:16px">Forgot your password</font></td>
       				  </tr>
					  <tr>
                        <td width="105">&nbsp;</td>
                        <td width="151" height="24"><b>Enter Your Email:</b></td>
                        <td width="144"><input type="text" name="email" placeholder="<?php //echo $tc->Email; ?>" /></td>
          				<td width="369"><?php echo $eemail; ?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"></td>
                        <td><input type="submit" name="sub" value="Request a new Password" /></td>
                        <td>&nbsp;</td>
                      </tr>
                </table>
  </form>


</div>
</div>