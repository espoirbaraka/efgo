<?php
	include './admin/includes/conn.php';
	session_start();


	if(isset($_SESSION['CodeSpectateur'])){
		header('location: match.php');
	}

?>