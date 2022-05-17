<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$postnom = $_POST['postnom'];
		$prenom = $_POST['prenom'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE t_agent SET NomAgent=:nom, PostnomAgent=:postnom, PrenomAgent=:prenom WHERE CodeAgent=:id");
			$stmt->execute(['nom'=>$nom, 'postnom'=>$postnom, 'prenom'=>$prenom, 'id'=>$id]);
			$_SESSION['success'] = 'Agent modifié avec succès';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../agent.php');

?>
