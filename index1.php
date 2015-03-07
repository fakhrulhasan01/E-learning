<?php include_once("controller/configuration.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>-->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<!-- Website SEO -->
		<title>Online learning for Software Department</title>
		<meta name="keywords" content="Imtiaz, Fakhrul Hasan, E-learning, Easy learning, Online Learning System, Software Department, Search Course Materials, Teacher and Students interaction, Education, Education forum, Private learning">
		<meta name="description" content="Easy learning System for Software Deapartment of Daffodil International University">



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


<script language="javascript" type="text/javascript" src="datetimepicker.js"></script>





<!--For dependent select box-->

<!--For html5 video player-->
<link href="http://vjs.zencdn.net/4.3/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/4.3/video.js"></script>













<!--For customization using tiny mce-->
<?php 
if(isset($_GET['m'])){//This tiny mce works when ?m is set in url
if(($_GET['m'] == 'homepageedit') || ($_GET['m'] == 'admininfoedit') || ($_GET['m'] == 'notice') || ($_GET['m'] == "noticeedit")){//Tiny mce works when the value of ?m is homepageedit or admininfoedit
?>
<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny mce/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
<?php }
}?>

</head>


<body style="margin:0px 0px 0px 0px;">





	<div class="templatemo_container">
		<div id="templatemo_header">
        	<div id="templatemo_logo_area">
            	<div id="templatemo_logo">
                SWE Learning
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
			}?>
			</div>
		<!--End of login box-->        
            <div id="templatemo_menu">
			<ul id="dropdown" style="margin:-6px 0px 0px 10px; border-radius:0px; z-index:1000; float:left; height:36px;">
				
				<li><a href="?p=home">Home</a></li>
                <?php if(isset($_SESSION['sid'])){?>
                <li><a href="#rea">Academic</a>
					<ul>
						<li><a href="?s=seepost">See Posts</a></li>
					</ul>
				</li>                
				<?php }?>
                        
                <?php if(isset($_SESSION['tid'])){?> 
				<li><a href="#comp">Upload</a>
					<ul>
						<li><a href="?t=upfiles">Upload Files</a></li>
						<li><a href="?t=upvideo">Upload Video</a></li>
						<li><a href="#ref">Our references</a></li>
					</ul>
				</li>
                <?php }?>
                
                
                
				<li><a href="?p=notice">Notice</a>
                
                <?php
                if(isset($_SESSION['id'])){
				?>
				<li><a href="#comp">Operation</a>
					<ul>
						<li><a href="?m=designation">Designation</a></li>
						<li><a href="?m=course">Add Course</a></li>
						<li><a href="?m=department">Add Department</a></li>
						<li><a href="?m=examtitle">Exam Title</a></li>
						<li><a href="?m=notice">Add Notice</a></li>
						<li><a href="?m=noticefile">Add Notice as file</a></li>
						<li><a href="?m=homepage">Change Home</a></li>
						<li><a href="?m=changeslide">Change Slide</a></li>
						<li><a href="?m=admininfo">Change Admin Info</a></li>
					</ul>
				</li>
                <?php }?>
				<?php  if(isset($_SESSION['sid']) || isset($_SESSION['tid'])){?>
				<li><a href="?ts=blog">Blog</a>
                
               <?php 
				}
			   if(isset($_SESSION['sid'])){
			   ?>
				<li><a href="?s=exam">Exam</a>
				<li><a href="?s=welcome">Your Info</a></li>
                <li><a href="#comp">Account</a>
					<ul>
						<li><a href="?s=profile">Profile</a></li>
						<li><a href="?s=ch_pass">Change Password</a></li>
						<li><a href="?p=logout">Logout</a></li>
					</ul>
				</li>
				<?php }?>
                
               <?php 
			   		if(isset($_SESSION['tid'])){
			   ?>
						<li><a href="?t=postquestion">Exam</a>
						<li><a href="?t=courses">Courses</a></li>               
               <li><a href="#comp">Account</a>
					<ul>
						<li><a href="?t=welcome">Your Info</a></li>               
						<li><a href="?t=ch_pass">Change Password</a></li>               
						<li><a href="?t=profile">Profile</a></li>
						<li><a href="?p=logout">Logout</a></li>
					</ul>
				</li>

             <?php }?>   
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
        
    
    <?php 
	
	require_once("controller/controlpages.php");
	?>
    
    
            <div class="cleaner"></div>
			
            <div id="templatemo_footer" style="border:1px #999 solid; background-color:#D7D7D7; height:36px">
      			Copyright © <?php echo date("Y");?> Designed by <b>Fakhrul Hasan</b><br />
                Software Department | <a href="http://www.daffodilvarsity.edu.bd" target="_blank">Daffodil International University</a>
        
			</div>  
        </div>
    </div>
</body>
</html>