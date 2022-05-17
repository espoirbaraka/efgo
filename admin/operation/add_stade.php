<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$stade = $_POST['stade'];
		$localisation = $_POST['localisation'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_stade WHERE CONCAT(Stade) = ?");
        $stmt->execute(array($stade));
		$agentexist = $stmt->rowCount();

		if($agentexist > 0){
			$_SESSION['error'] = 'Un autre stade possede le meme nom';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO t_stade(Stade, LocalisationStade) VALUES (:stade, :localis)");
				$stmt->execute(['stade'=>$stade, 'localis'=>$localisation]);
				$_SESSION['success'] = 'Stade ajouté';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../stade.php');

?>
