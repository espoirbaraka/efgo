<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$service = $_POST['service'];
		$prevision = $_POST['prevision'];
		$timing = $_POST['timing'];
		$conn = $pdo->open();

		
			try{
				$stmt = $conn->prepare("INSERT INTO t_service(Service, Prevision, Timing) VALUES (:service, :prevision, :timing)");
				$stmt->execute(['service'=>$service, 'prevision'=>$prevision, 'timing'=>$timing]);
				$_SESSION['success'] = 'Service ajouté';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../service.php');

?>
