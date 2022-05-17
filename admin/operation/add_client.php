<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$nom = $_POST['nom'];
		$postnom = $_POST['postnom'];
		$prenom = $_POST['prenom'];
		$telephone = $_POST['telephone'];
		$adresse = $_POST['adresse'];
        $agent = $nom.''.$postnom.''.$prenom;

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_client WHERE CONCAT(NomClient, PostnomClient, PrenomClient) = ?");
        $stmt->execute(array($agent));
		$agentexist = $stmt->rowCount();

		if($agentexist > 0){
			$_SESSION['error'] = 'Un client ayant le meme nom existe déjà';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO t_client(NomClient, PostnomClient, PrenomClient, TelephoneClient, AdresseClient) VALUES (:nom, :postnom, :prenom, :telephone, :adresse)");
				$stmt->execute(['nom'=>$nom, 'postnom'=>$postnom, 'prenom'=>$prenom, 'telephone'=>$telephone, 'adresse'=>$adresse]);
				$_SESSION['success'] = 'Client ajouté';

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

	header('location: ../client.php');

?>
