<?php
$hm = new HomePage();
?>

		<div id="templatemo_content_area">
        	<div id="templatemo_left">
            
				<?php
				$hm->Location = 'h';
                $r = $hm->Select();
				if($r != ""){
						for($i=0; $i<count($r); $i++){
							//for($i=1; $i<=2; $i++){
						if($i>0){
						?>            
						<div class="templatemo_post" style="width:888px;">
							<div class="templatemo_post_title" style="width:900px; background-color:#0FF; background-image:url(images/templatemo_section_title_3.jpg)">
                        <?php }else{?>
						<div class="templatemo_post">
							<div class="templatemo_post_title">
                        <?php }?>
								<a href="?p=readdetails&id="><?php echo $r[$i][1]; ?></a>
							</div>
							<?php 
							if($i>0){
							?>
							<div class="templatemo_post_text" style="height:auto; width:878px">
							<?php }else{?>
							<div class="templatemo_post_text" style="height:auto;">
                            <?php }?>
							<?php 
								if($r[$i][3] != ""){
							?>
								<a href="?p=readdetails&id="><img src="images/<?php echo $r[$i][3]; ?>" alt="Flower" width="150" height="150" /></a>
							<?php }
								if($i>0){
							?>
								<p style="height:auto; border:none; width:868px">
								<?php read_files($r[$i][2], "All"); ?>
								</p>
                            <?php }else{?>
								<p style="height:auto">
								<?php read_files($r[$i][2], "All"); //echo "<br />HIHI"; ?>
								</p>
                            <?php }?>
							</div>
							
                            
                           <?php 
						   if($i>0){
						   ?>
							<div class="templatemo_post_bottom" style="position:relative; width:900px; background-image:url(images/title_bottom_2.jpg)">
						   <?php }else{?>
							<div class="templatemo_post_bottom" style="position:relative">
                           <?php }?>
								<a href="?p=readdetails&id=<?php echo $r[$i][0]; ?>">Read More</a>
							</div>
					  </div>
					  
					  
					<?php //}
						}
					}
					if(isset($_SESSION['sid']) || isset($_SESSION['tid']) || isset($_SESSION['id'])){
						echo "";
					}else{
						echo "<br /><br /><br />";
					}
					
					
					?>               
            
            
            
            </div><!-- End Of left-->
            
</div>