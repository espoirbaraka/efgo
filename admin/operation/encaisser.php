<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$montant = $_POST['montant'];
		$motif = $_POST['motif'];
		$commande = $_POST['id'];
        $today = date('Y-m-d');
		$conn = $pdo->open();

		
			try{
				$stmt = $conn->prepare("INSERT INTO t_encaissement(Montant, Motif, DateEncaissement, CodeCommande) VALUES (:montant, :motif, :date, :commande)");
				$stmt->execute(['montant'=>$montant, 'motif'=>$motif, 'date'=>$today, 'commande'=>$commande]);
                $stmt2 = $conn->prepare("UPDATE t_commander_service SET Status=:status WHERE CodeCommande=:code");
				$stmt2->execute(['status'=>1, 'code'=>$commande]);
				$_SESSION['success'] = 'Montant encaissé';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../encaissement.php');

?>
