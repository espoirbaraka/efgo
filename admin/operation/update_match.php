<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
        $id = $_POST['id'];
		$date = $_POST['edit_date'];
        $time = $_POST['edit_heure'];

		$conn = $pdo->open();;

		try{
			$stmt = $conn->prepare("UPDATE t_match SET Date=:date, Heure=:heure WHERE CodeMatch=:id");
			$stmt->execute(['date'=>$date, 'heure'=>$time, 'id'=>$id]);
			$_SESSION['success'] = 'Match modifié avec succès';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../match.php');

?>
