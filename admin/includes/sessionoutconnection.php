<?php
	include './includes/conn.php';
	session_start();


	if(isset($_SESSION['CodeAgent'])){
		header('location: home.php');
	}

?>