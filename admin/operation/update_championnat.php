<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$championnat = $_POST['edit_championnat'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE t_championnat SET Championnat=:championnat WHERE CodeChampionnat=:id");
			$stmt->execute(['championnat'=>$championnat, 'id'=>$id]);
			$_SESSION['success'] = 'Championnat modifié';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../championnat.php');

?>
