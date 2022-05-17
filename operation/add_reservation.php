<?php
	include '../admin/includes/conn.php';

	if(isset($_POST['reserver'])){
		$id = $_POST['id'];
		$nom = $_POST['nom'];
        $postnom = $_POST['postnom'];
        $nbre = $_POST['nbre'];
        $categorie = $_POST['categorie'];
        $today = date('Y-m-d');

		$conn = $pdo->open();

		
			try{
				$stmt = $conn->prepare("INSERT INTO t_reservation(CodeMatch, CodeCategorie, DateReservation, Nombre, NomClient, PostnomClient) VALUES (:match, :categorie, :date, :nbre, :nom, :postnom)");
				$stmt->execute(['match'=>$id, 'categorie'=>$categorie, 'date'=>$today, 'nbre'=>$nbre, 'nom'=>$nom, 'postnom'=>$postnom]);
				$_SESSION['success'] = 'Reservation ajouté';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../match.php');

?>
