<div class="o_container">

<?php
$cs = new Course();
$msg = "";
$err = 0;

			if(isset($_POST['sub'])) {
				if($_POST['name'] == "") {
					$err++;
					$msg .= "{$err}. Name Required<br>";
				}
				if($err == 0) {					
					$cs->Name = $_POST['name'];
					$cs->Id = $_POST['id'];
					if($cs->Update()) {
						$msg .= "Update Successful";	
					}else{
						$msg .= $cs->Err;	
					}
				}
				Redirect("?m=course&ms={$msg}");
			}
			$cs->Id = $_GET['id'];
			$cs->SelectById();
		?>
        <h2>Edit of Course Name</h2>
        <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <table width="400" border="0" bgcolor="#00CCFF">
          <tr>
            <td><b>Course Name:</b></td>
            <td><input type="text" name="name" value="<?php echo $cs->Name; ?>" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Update" name="sub"></td>
          </tr>
        </table>
        </form>



</div><!-- End Of Container -->


