<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$id = $_POST['id'];
		$montant = $_POST['montant'];
        $agent = $_SESSION['CodeAgent'];

		$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO t_payement(CodeReservation, Montant, CodeAgent) VALUES (:reserv, :montant, :agent)");
				$stmt->execute(['reserv'=>$id, 'montant'=>$montant, 'agent'=>$agent]);

                $stmt2 = $conn->prepare("UPDATE t_reservation SET Status=:status WHERE CodeReservation=:reserv");
				$stmt2->execute(['status'=>1, 'reserv'=>$id]);
				$_SESSION['success'] = 'Payement effectué';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../payement.php');

?>
