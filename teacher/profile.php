<div id="templatemo_image_fader" style="background-color:#F4F4F4; height:auto;">
<?php 
$dg = new Designation();
$dp = new Department();
$dp->Id = $tc->DepartmentId;
$dp->SelectById();
$dg->Id = $tc->DesignationId;
$dg->SelectById();
?>

<br />

			   <table width="452" style="margin:0px 0px 0px 40px;">
               		  <tr>
                      	<td colspan="2">
                      		<?php 
								if(isset($_GET['msg'])){
									mss($_GET['msg']);
								}
							?>
                      	</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td height="33" colspan="2"> <h2 style="text-align:right;"> View Your Profile</h2></td>
                        <td><a href="?t=edit_profile"><button style="float:right; height:24px;">Edit Profile</button></a></td>
                      </tr>
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td colspan="2">
                        <?php 
							if($tc->Picture != ""){
						?>
                        		<img src="images/<?php echo $tc->Picture; ?>" height="140" width="140" />
                        <?php }
						?>
                        </td>
                      </tr>
                      
                      <tr>
                        <td width="98">&nbsp;</td>
                        <td width="142" height="33"><h2>Name:</h2></td>
                        <td width="196"><h3><?php echo $tc->Name; ?></h3></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><h2>Country:</h2></td>
                        <td><h3><?php if($tc->Country == "b"){echo "Bangladesh"; } ?></h3></td>
                      </tr>  
                       <tr>
                         <td>&nbsp;</td>
                        <td height="105"><h2>Address:</h2></td>
                        <td><h3><?php FileRead("files/" . $tc->Address); ?></h3></td>
                      </tr>  
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35"><h2>Designation:</h2></td>
                        <td><h3><?php echo $dg->Name; ?></h3></td>
                      </tr>
                       <tr>
                         <td>&nbsp;</td>
                        <td height="40"><h2>Department:</h2></td>
                        <td><h3><?php echo $dp->Name; ?></h3></td>
                      </tr>
                </table>



</div>
</div>