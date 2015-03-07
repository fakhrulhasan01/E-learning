<div id="templatemo_content_area">
				<?php
				$nt = new Notice();
				$nt->Id = $_GET['id'];
				$nt->SelectById();
                ?>            


        	<div id="templatemo_left" style="margin:0px 0px 0px 40px;">
            
            	<div class="templatemo_post" style="width:800px;">
                	<div class="templatemo_post_title" style="width:800px; background-image:url(images/title.png);">
                    	<?php echo $nt->Name; ?></div>
                    <div class="templatemo_post_text" style="width:758px; height:auto;">
                        <p>
                        <?php read_files($nt->Description, "All"); ?>
                        </p>
                  </div>
                    
      <div class="templatemo_post_bottom" style="background-image:url(images/title_bottom.png); width:800px; margin:-20px 0px 0px 0px;">
                <?php echo $nt->Ndate . " &nbsp;&nbsp;&nbsp;&nbsp; "; ?>      
              </div>
            
            
            
            </div><!-- End Of left-->
            
</div>
</div>
</div>