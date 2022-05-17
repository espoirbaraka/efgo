<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$outil = $_POST['outil'];
		$qte = $_POST['qte'];
		$pu = $_POST['pu'];
        $motif = $_POST['motif'];
        $agent = $_SESSION['CodeAgent'];
		$conn = $pdo->open();

		
			try{
				$stmt = $conn->prepare("INSERT INTO t_besoin(Besoin, Unite, PrixUnitaire, Status, Motif, CodeAgent) VALUES (:besoin, :unite, :pu, :status, :motif, :agent)");
				$stmt->execute(['besoin'=>$outil, 'unite'=>$qte, 'pu'=>$pu, 'status'=>0, 'motif'=>$motif, 'agent'=>$agent]);
				$_SESSION['success'] = 'Etat de besoin redigé';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../besoin.php');

?>
