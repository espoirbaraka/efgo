<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$equipe = $_POST['equipe'];
		$siege = $_POST['siege'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_equipe WHERE CONCAT(NomEquipe) = ?");
        $stmt->execute(array($equipe));
		$agentexist = $stmt->rowCount();

		if($agentexist > 0){
			$_SESSION['error'] = 'Une equipe ayant le meme nom existe déjà';
		}
		else{
			$filename = $_FILES['photo']['name'];
			$date = date('Y-m-d');
			if(!empty($filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$filename);	
			}
			try{
				$stmt = $conn->prepare("INSERT INTO t_equipe(NomEquipe, SiegeEquipe, LogoEquipe) VALUES (:nom, :siege, :logo)");
				$stmt->execute(['nom'=>$equipe, 'siege'=>$siege, 'logo'=>$filename]);
				$_SESSION['success'] = 'Equipe ajouté';

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

	header('location: ../equipe.php');

?>
