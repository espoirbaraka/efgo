<?php
	include("../admin/includes/conn.php");

	if(isset($_POST['add'])){
		$nom = $_POST['nom'];
		$postnom = $_POST['postnom'];
		$prenom = $_POST['prenom'];
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
        $agent = $nom.''.$postnom.''.$prenom;

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_spectateur WHERE CONCAT(NomSpectateur, PostnomSpectateur, PrenomSpectateur) = ?");
        $stmt->execute(array($agent));
		$spectexist = $stmt->rowCount();

		if($spectexist > 0){
			$_SESSION['error'] = 'Un spectateur ayant le meme nom existe déjà';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO t_spectateur(NomSpectateur, PostnomSpectateur, PrenomSpectateur, Username, Password) VALUES (:nom, :postnom, :prenom, :username, :password)");
				$stmt->execute(['nom'=>$nom, 'postnom'=>$postnom, 'prenom'=>$prenom, 'username'=>$username, 'password'=>$password]);
				$_SESSION['success'] = 'Spectateur ajouté';

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

	header('location: ../match.php');

?>
