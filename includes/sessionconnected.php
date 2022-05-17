<?php
	include '../admin/includes/conn.php';
	session_start();

	if(!isset($_SESSION['CodeSpectateur']) || trim($_SESSION['CodeSpectateur']) == ''){
		header('location: ./match.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM t_spectateur WHERE CodeSpectateur=:code");
	$stmt->execute(['code'=>$_SESSION['CodeSpectateur']]);
	$user = $stmt->fetch();

	$pdo->close();

?>