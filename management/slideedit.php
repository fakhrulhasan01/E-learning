<div class="o_container">
<?php 
$ss = new SlideShow();



		if(isset($_POST['sub']))
		{
			$err = 0;
			
			
				
			if($err == 0) {
				$ss->Id = $_POST['id'];
				$ss->SelectById();
				if(($_FILES['pic']['name'] != "") && (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($ss->Picture != "")
					{
						$sspp = "images/" . $ss->Images;
						unlink($sspp);
					}
					$ss->Images = UploadPicture($_FILES['pic']);
				}
				$ss->Id = $_POST['id'];
				if($ss->Update()){
					$msg .= "Changeg Slide image.";
				}else{
					$ss->Err;
				}
				Redirect("?m=changeslide&ms={$msg}");
			}
		}
		


$ss->Id = $_GET['id'];
$ss->SelectById();		
?>



<form action="" method="post"  name="myform" enctype="multipart/form-data"> 
	  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
    <table width="760" border="0">
      <tr>
            <td height="115"></td>
        <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="179" height="44"></td>
        <td width="56"><b>Picture:</b></td>
        <td width="218">
          <input type="file" name="pic" /><br>

   	 	  <?php 
			if($ss->Images != ""){
				echo "<img src='images/{$ss->Images}' width='100' />";
			}else{
				echo "<b>No Image</b>";	
			}
			?>
        </td>
        <td width="289"><p style="color:red;">* Image resulation must be 960*240px</p></td>
      </tr>
          
          
      <tr>
        <td height="26"></td>
        <td></td>
        <td><input type="submit" value="Update" name="sub"></td>
        <td></td>
      </tr>
      <tr>
        <td height="149"></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
	</form>


</div>
</div>