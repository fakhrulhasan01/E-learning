
<script type="text/javascript" src="../js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	$("#con").click(function(){
		alert("Hi");
	});
});
</script>
		<div id="templatemo_image_fader" style="width:620px">
        	 <script type="text/javascript">
			 
var fadeimages=new Array()
//SET IMAGE PATHS. Extend or contract array as needed
<?php 
$ss = new SlideShow();
$r = $ss->Select();
for($i=0; $i<count($r); $i++){
	
?>
fadeimages[<?php echo $i; ?>]=["images/<?php echo $r[$i][1]; ?>", "", ""] //plain image syntax
<?php }?>

 
var fadebgcolor="white"


//new fadeshow(IMAGES_ARRAY_NAME, slideshow_width, slideshow_height, borderwidth, delay, pause (0=no, 1=yes), optionalRandomOrder)
new fadeshow(fadeimages, 600, 240, 0, 2000, 1, "R")
 
			</script>
        </div>
        		
<?php
Redirect("?p=home#templatemo_menu"); 
include_once("common_part.php"); 
?>

            <div id="templatemo_right" style="margin-top:-270px;">
            	<div class="templatemo_section">
			<?php require_once("show_teacher.php"); ?>               
                <?php 
				if(isset($_SESSION['sid']) || isset($_SESSION['tid']) || isset($_SESSION['id'])){
					}else{
				?>
                	<div class="templatemo_section_title" id="con">
                    	Login
                    </div>
                    <div class="templatemo_section_bottom">
                    	<ul class="templatemo_list">
                        	<li><a href="?p=stdlogin">Login for student</a></li><br />
<br />

                            <li><a href="?p=tclogin">Login for Teacher</a></li>
                        </ul>
                    </div>
                    <?php }?>
				</div>
                    
               
            
`            <div class="cleaner"></div>
        
        </div><!-- End Of Content area -->
    </div><!-- End Of Container -->
