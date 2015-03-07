<?php 
if(isset($_GET['p'])){
	require_once("view/" . $_GET['p'] . ".php");
}else if(isset($_GET['m']) && isset($_SESSION['id'])){
	require_once("management/" . $_GET['m'] . ".php");
}else if(isset($_GET['t']) && isset($_SESSION['tid'])){
	require_once("teacher/" . $_GET['t'] . ".php");
}else if(isset($_GET['s']) && isset($_SESSION['sid'])){
	require_once("student/" . $_GET['s'] . ".php");
}else if((isset($_GET['ts'])) && (isset($_SESSION['sid']) || isset($_SESSION['tid']) )){
	require_once("ts/" . $_GET['ts'] . ".php");
}else{
	require_once("view/home.php");
}
?>
