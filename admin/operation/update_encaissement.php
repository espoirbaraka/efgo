<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['update'])){
        $id = $_POST['id'];
		$montant = $_POST['montant'];

		$conn = $pdo->open();;

		try{
			$stmt = $conn->prepare("UPDATE t_encaissement SET Montant=:montant WHERE CodeEncaissement=:id");
			$stmt->execute(['montant'=>$montant, 'id'=>$id]);
			$_SESSION['success'] = 'Montant modifiée';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../encaissement.php');

?>
