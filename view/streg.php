<div class="o_container">
<?php
if(isset($_GET['ms'])){
	echo "<h2>" . $_GET['ms'] . "</h2>";
}

if(isset($_GET['mm'])){echo $_GET['mm'];}
?>
<br />
<h2>Please <a href="?p=stdlogin">Login</a></h2>
</div>