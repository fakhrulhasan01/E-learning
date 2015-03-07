<?php include_once("controller/configuration.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Learning Management</title>
<meta name="keywords" content="free css template, orange bar, XHTML, CSS" />
<meta name="description" content="Orange Bar is a free CSS template from templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="templatemo_image_fader.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<style type="text/css">
<!--
.style2 {font-size: 21px}
-->
</style>
		<link href="css/styles.css" rel="stylesheet" type="text/css" />
		<link href="css/juizDropDownMenu.css" rel="stylesheet" type="text/css" />







<!--For dependent select box-->

</head>


<body style="margin:0px 0px 0px 0px;">





	<div class="templatemo_container">
		<div id="templatemo_header">
        	<div id="templatemo_logo_area">
            	<div id="templatemo_logo">
                Online Learning
            </div>
                <div id="templatemo_slogan">
                <?php
                if(isset($_GET['ms'])){
					echo $_GET['ms'];
				}
				?>
                </div>
                <div class="cleaner"></div>
            </div>
            
            <div id="templatemo_search">
            <?php 
			if(isset($_SESSION['id'])){
				echo "<a href='?p=logout'>Logout</a>";
			}else{
			?>
    <form action="index.php?p=check" method="post">
            <table width="500">
                  <tr>
                    <td><b style="color:#999;">Email:</b></td><td><input type="text" name="email" /></td>
                    <td><b style="color:#999;">Password</b></td><td><input type="password" name="password" /></td>
                    <td><input type="submit" name="mlog" value="Login" /></td>
                  </tr>
                </table>
			</form>
            <?php }?>
			</div>
		<!--End of login box-->        
            <div id="templatemo_menu">
			<ul id="dropdown" style="margin:-6px 0px 0px 10px; border-radius:0px; z-index:1000; float:left; height:36px;">
				

				<li><a href="?p=home">Home</a></li>
			</ul>
		
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>	
		<script type="text/javascript" src="js/juizDropDownMenu-1.5.min.js"></script>
		<script type="text/javascript">
		$(function(){
			$("#dropdown").juizDropDownMenu({
				'showEffect' : 'fade',
				'hideEffect' : 'slide'
			});
		});
		</script>
			</div>
<!--End of menu-->            
        </div><!-- end of header -->
       
    
    
   
            <div class="cleaner"></div>
</div>			
            <div id="templatemo_footer" style="border:1px #999 solid; background-color:#D7D7D7; height:28px">
      			Copyright © 2024 <a href="#">Your Company Name</a> | Designed by Fakhrul Hasan</a>        
			</div>  
        </div>
    </div>
</body>
</html>