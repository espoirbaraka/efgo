<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$filename);	
		}
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE t_agent SET Photo=:photo WHERE CodeAgent=:id");
			$stmt->execute(['photo'=>$filename, 'id'=>$id]);
			$_SESSION['success'] = 'Photo de l\'agent mise à jour avec succès';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Selectionnez le presentateur dont la photo doit être modifiée';
	}

	header('location: ../agent.php');
?>
