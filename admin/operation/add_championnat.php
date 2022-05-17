<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$championnat = $_POST['championnat'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_championnat WHERE CONCAT(Championnat) = ?");
        $stmt->execute(array($championnat));
		$agentexist = $stmt->rowCount();

		if($agentexist > 0){
			$_SESSION['error'] = 'Un autre championnat du meme nom existe déjà';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO t_championnat(Championnat) VALUES (:championnat)");
				$stmt->execute(['championnat'=>$championnat]);
				$_SESSION['success'] = 'Championnat ajouté';

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

	header('location: ../championnat.php');

?>
