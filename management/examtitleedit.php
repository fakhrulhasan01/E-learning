<div class="o_container">

<?php
$et = new ExamTitle();
$msg = "";
$err = 0;

			if(isset($_POST['sub'])) {
				if($_POST['name'] == "") {
					$err++;
					$msg .= "{$err}. Name Required<br>";
				}
				if($err == 0) {					
					$et->Name = $_POST['name'];
					$et->Id = $_POST['id'];
					if($et->Update()) {
						$msg .= "Update Successful";	
					}else{
						$msg .= $et->Err;	
					}
				}
				Redirect("?m=examtitle&ms={$msg}");
			}
			$et->Id = $_GET['id'];
			$et->SelectById();
		?>
        <h2>Edit of Course Name</h2>
        <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <table width="400" border="0" bgcolor="#00CCFF">
          <tr>
            <td><b>Course Name:</b></td>
            <td><input type="text" name="name" value="<?php echo $et->Name; ?>" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Update" name="sub"></td>
          </tr>
        </table>
        </form>



</div><!-- End Of Container -->


