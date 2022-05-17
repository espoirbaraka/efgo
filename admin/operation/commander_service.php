<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['commander'])){
		$client = $_POST['id'];
		$service = $_POST['service'];
		$detail = $_POST['detail'];
		$today = date('Y-m-d');
		$agent = $_SESSION['CodeAgent'];

		$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO t_commander_service(CodeClient, CodeService, CodeAgent, DetailCommande, Status) VALUES (:client, :service, :agent, :detail, :status)");
				$stmt->execute(['client'=>$client, 'service'=>$service, 'agent'=>$agent, 'detail'=>$detail, 'status'=>0]);
				$_SESSION['success'] = 'Comande passée';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../commande.php');

?>
