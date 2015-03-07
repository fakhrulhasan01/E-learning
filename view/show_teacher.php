<?php 
$tcr = new Teacher();
?>
                <div class="templatemo_section">
                
                	<div class="templatemo_section_title">
                		Admin Info
                    </div>
                    <div class="templatemo_section_bottom">
           	    	<ul class="templatemo_list">
                    
		<!--  	  <marquee direction="up" onMouseOver="stop()" onMouseOut="start()">
                        <?php 
						//$r = $tcr->Select();
						//if($r != ""){
							//for($i=0; $i<10; $i++){
						?>
	           	    	<li>
                        <img style="margin:10px 0px 0px 0px;" src="images/<?php //echo $r[$i][9]; ?>" height="140" width="200" /><br />
	                    </li>
                        <?php //} }?>
                        </marquee>-->
                        
                        
                        <li>
                        	<!--<b>Teacher Info</b>-->
                        </li>
                        
                        
                        
                        
                        <li>
                        	<?php 
							$hm = new Homepage();
							$hm-> Location = 'a';
							$r = $hm->Select();
							if($r != ""){
								for($i=0; $i<count($r); $i++){
									//FileRead("largefiles/" . $r[$i][2]);
									echo '<li>'.$r[$i][1].'</li>';
									echo '<li>
                        					<img height="140" width="200" src="images/'.$r[$i][3].'" />
                        				  </li>';
									echo '<li class="txtInfo">';
									FileRead("files/" . $r[$i][2]);
									echo '</li>';
									echo '<li><br /></li>';
								}
							}
							?>
                        </li>
                      </ul>
                    </div>
                </div>
            </div><!-- End Of right-->
