<?php
	include 'conn.php';
	session_start();

	if(!isset($_SESSION['CodeAgent']) || trim($_SESSION['CodeAgent']) == ''){
		header('location: ./index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM t_agent WHERE CodeAgent=:code");
	$stmt->execute(['code'=>$_SESSION['CodeAgent']]);
	$user = $stmt->fetch();

	$pdo->close();

?>