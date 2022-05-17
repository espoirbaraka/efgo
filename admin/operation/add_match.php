<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$equipea = $_POST['equipea'];
        $equipeb = $_POST['equipeb'];
		$date = $_POST['date'];
        $heure = $_POST['heure'];
        $montant = $_POST['montant'];
        $stade = $_POST['stade'];
        $championnat = $_POST['championnat'];
        $today=date('Y-m-d');

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_equipe WHERE CodeEquipe = ? AND NomEquipe=?");
        $stmt->execute(array($equipea, $equipeb));
		$agentexist = $stmt->rowCount();

		if($agentexist > 0){
			$_SESSION['error'] = 'Parametre incorrect. un match doit se jouer entre 2 équipes différentes';
		}
        elseif($date<$today)
        {
            $_SESSION['error'] = 'Date incorrect!!! vous ne devez pas mettre une date passée';
        }
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO t_match(Equipe_A, Equipe_B, Date, Heure, MontantStandard, CodeStade, CodeChampionnat) VALUES (:equipea, :equipeb, :date, :heure, :montant, :stade, :championnat)");
				$stmt->execute(['equipea'=>$equipea, 'equipeb'=>$equipeb, 'date'=>$date, 'heure'=>$heure, 'montant'=>$montant, 'stade'=>$stade, 'championnat'=>$championnat]);
				$_SESSION['success'] = 'Match ajouté';

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
