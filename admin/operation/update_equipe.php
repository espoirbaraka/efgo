<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
		$edit_equipe = $_POST['edit_equipe'];
		$edit_siege = $_POST['edit_siege'];
		$id = $_POST['id'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE t_equipe SET NomEquipe=:equipe, SiegeEquipe=:siege WHERE CodeEquipe=:id");
			$stmt->execute(['equipe'=>$edit_equipe, 'siege'=>$edit_siege, 'id'=>$id]);
			$_SESSION['success'] = 'Equipe modifié avec succès';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../equipe.php');

?>
