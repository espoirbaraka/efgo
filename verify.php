<?php
	include './admin/includes/conn.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		$username = $_POST['utilisateur'];
		$password = sha1($_POST['pass']);
		try{
			$stmt = $conn->prepare("SELECT * FROM t_spectateur WHERE Username = ? AND Password = ?");
            $stmt->execute(array($username,$password));
			$nbre = $stmt->rowCount();
			
			if($nbre == 1){
				$row = $stmt->fetch();
				$_SESSION['CodeSpectateur'] = $row['CodeSpectateur'];
                $_SESSION['error'] = 'ok';
			}
			else{
				$_SESSION['error'] = 'Compte inexistant';
			}
		}
		catch(PDOException $e){
			echo "Erreur de connexion: " . $e->getMessage();
		}
	


	}
	else{
		$_SESSION['error'] = 'Entrez vos identifiants de connexion d\'abord';
	}

	$pdo->close();
	header('location: match.php');

?>
