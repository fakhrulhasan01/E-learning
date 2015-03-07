<div id="templatemo_image_fader" style="background-color:#E6E6E6; height:auto;">

<?php
	$cs = new Course();
	$tc = new Teacher();
	
	$cs->Id = $st->CourseId;
	$cs->SelectById();
	
	$tc->Id = $st->TeacherId;
	$tc->SelectById();

?>


			   <table width="494" style="margin:0px 0px 0px 40px;">
               		  <tr>
                      <td></td>
                      <td colspan="2"><h2>View your profile</h2></td>
                      <td width="120"></td>
                      </tr>
                      <tr>
                      <td></td>
                        <td height="33" colspan="2"> <h2 style="text-align:left;"> Your Profile</h2></td>
                        <td><a href="?s=edit_profile"><button style="float:right; height:24px;">Edit Profile</button></a></td>
                      </tr>
                      <?php 
					  if($st->Picture != ""){
					  ?>
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td colspan="2"><img src="images/<?php echo $st->Picture; ?>" height="140" width="140" /></td>
                      	<td></td>
                      </tr>
                      <?php
					  }
					  ?>
                      <tr>
                        <td width="80">&nbsp;</td>
                        <td width="162" height="33"><h2>Name:</h2></td>
                        <td width="112"><h3><?php echo $st->Name; ?></h3></td>
                      <td></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="39"><h2>Email:</h2></td>
                        <td><h3><?php echo $st->Email; ?></h3></td>
                      <td></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><h2>Country:</h2></td>
                        <td><h3><?php if($st->Country == "b"){echo "Bangladesh"; } ?></h3></td>
                      <td></td>
                      </tr>  
                       <tr>
                         <td>&nbsp;</td>
                        <td height="105"><h2>Address:</h2></td>
                        <td><h3><?php FileRead("files/" . $st->Address); ?></h3></td>
                      <td></td>
                      </tr> 
                      

                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><h2>Date of Birth:</h2></td>
                        <td><h3><?php echo $st->DOB; ?></h3></td>
                      <td></td>
                      </tr>  
                       
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><h2>Your Course:</h2></td>
                        <td><h3><?php echo $cs->Name; ?></h3></td>
                      <td></td>
                      </tr>
                </table>



</div>
</div>