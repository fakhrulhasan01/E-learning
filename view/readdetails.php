<div id="templatemo_content_area">
				<?php
				$hm = new Homepage();
				$hm->Id = $_GET['id'];
				$hm->SelectById();
                ?>            


        	<div id="templatemo_left" style="margin:0px 0px 0px 40px;">
            
            	<div class="templatemo_post" style="width:800px;">
                	<div class="templatemo_post_title" style="width:800px; background-image:url(images/title.png);">
                    	<?php echo $hm->Title; ?></div>
                    <div class="templatemo_post_text" style="width:758px; height:auto;">
                    <?php 
						if($hm->Picture != ""){
					?>
	                    <img src="images/<?php echo $hm->Picture; ?>" alt="<?php echo $hm->Title; ?>" width="180" height="180" />
                    <?php }?>
                        <p>
                        <?php read_files($hm->Description, "All"); ?>
                        </p>
                  </div>
                    
      <div class="templatemo_post_bottom" style="background-image:url(images/title_bottom.png); width:800px; margin:-20px 0px 0px 0px;">
                      
              </div>
            
            
            
            </div><!-- End Of left-->
            
</div>
</div>
</div>