<div class="o_container">

<?php
$dpt = new Department();
$msg = "";
$err = 0;

			if(isset($_POST['sub'])) {
				if($_POST['name'] == "") {
					$err++;
					$msg .= "{$err}. Name Required<br>";
				}
				if($err == 0) {					
					$dpt->Name = $_POST['name'];
					$dpt->Id = $_POST['id'];
					if($dpt->Update()) {
						$msg .= "Update Successful";	
					}else{
						$msg .= $dpt->Err;	
					}
				}
				Redirect("?m=department&ms={$msg}");
			}
			$dpt->Id = $_GET['id'];
			$dpt->SelectById();
		?>
        <h2>Edit of Department Name</h2>
        <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <table width="400" border="0" bgcolor="#00CCFF">
          <tr>
            <td><b>Department Name:</b></td>
            <td><input type="text" name="name" value="<?php echo $dpt->Name; ?>" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Update" name="sub"></td>
          </tr>
        </table>
        </form>



</div><!-- End Of Container -->


