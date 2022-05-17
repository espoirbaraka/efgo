<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
        $id = $_POST['id'];
		$score = $_POST['score'];

		$conn = $pdo->open();;

		try{
			$stmt = $conn->prepare("UPDATE t_match SET Score=:score, Status=:status WHERE CodeMatch=:id");
			$stmt->execute(['score'=>$score, 'status'=>1, 'id'=>$id]);
			$_SESSION['success'] = 'Match achevé';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../match.php');

?>
