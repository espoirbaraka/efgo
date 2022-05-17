<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$stade = $_POST['stade'];
		$localisation = $_POST['localisation'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE t_stade SET Stade=:stade, LocalisationStade=:localis WHERE CodeStade=:id");
			$stmt->execute(['stade'=>$stade, 'localis'=>$localisation, 'id'=>$id]);
			$_SESSION['success'] = 'Stade modifié';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../stade.php');

?>
