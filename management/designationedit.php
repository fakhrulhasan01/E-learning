<div class="o_container">

<?php
$dg = new Designation();
$msg = "";
$err = 0;

			if(isset($_POST['sub'])) {
				if($_POST['name'] == "") {
					$err++;
					$msg .= "{$err}. Name Required<br>";
				}
				if($err == 0) {					
					$dg->Name = $_POST['name'];
					$dg->Id = $_POST['id'];
					if($dg->Update()) {
						$msg .= "Update Successful";	
					}else{
						$msg .= $dg->Err;	
					}
				}
				Redirect("?m=designation&ms={$msg}");
			}
			$dg->Id = $_GET['id'];
			$dg->SelectById();
		?>
        <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <table width="400" border="0" bgcolor="#00CCFF">
          <tr>
            <td><b>Designaetion Name:</b></td>
            <td><input type="text" name="name" value="<?php echo $dg->Name; ?>" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Update" name="sub"></td>
          </tr>
        </table>
        </form>



</div><!-- End Of Container -->


