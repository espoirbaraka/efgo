<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM t_stade WHERE CodeStade=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Stade supprimé avec succès';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Selectionnez l\'utilisateur à supprimer';
	}

	header('location: ../stade.php');
	
?>
