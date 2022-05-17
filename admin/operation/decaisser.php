<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$pu = $_POST['pu'];
		$motif = $_POST['motif'];
		$id = $_POST['id'];
        $today = date('Y-m-d');
		$conn = $pdo->open();

		
			try{
				$stmt = $conn->prepare("INSERT INTO t_decaissement(Montant, Motif, DateDecaissement, CodeBesoin) VALUES (:montant, :motif, :date, :besoin)");
				$stmt->execute(['montant'=>$pu, 'motif'=>$motif, 'date'=>$today, 'besoin'=>$id]);
                $stmt2 = $conn->prepare("UPDATE t_besoin SET Status=:status WHERE CodeBesoin=:code");
				$stmt2->execute(['status'=>1, 'code'=>$id]);
				$_SESSION['success'] = 'Montant Decaisse';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../decaissement.php');

?>
