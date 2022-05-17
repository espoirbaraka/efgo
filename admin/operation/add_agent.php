<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$nom = $_POST['nom'];
		$postnom = $_POST['postnom'];
		$prenom = $_POST['prenom'];
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
        $agent = $nom.''.$postnom.''.$prenom;

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_agent WHERE CONCAT(NomAgent, PostnomAgent, PrenomAgent) = ?");
        $stmt->execute(array($agent));
		$agentexist = $stmt->rowCount();

		if($agentexist > 0){
			$_SESSION['error'] = 'Un agent ayant le meme nom existe déjà';
		}
		else{
			$filename = $_FILES['photo']['name'];
			$date = date('Y-m-d');
			if(!empty($filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$filename);	
			}
			try{
				$stmt = $conn->prepare("INSERT INTO t_agent(NomAgent, PostnomAgent, PrenomAgent, Photo, Username, Password) VALUES (:nom, :postnom, :prenom, :photo, :username, :password)");
				$stmt->execute(['nom'=>$nom, 'postnom'=>$postnom, 'prenom'=>$prenom, 'photo'=>$filename, 'username'=>$username, 'password'=>$password]);
				$_SESSION['success'] = 'Agent ajouté';

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

	header('location: ../agent.php');

?>
