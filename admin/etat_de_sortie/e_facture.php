<?php
require('fpdf/fpdf.php');
require_once'../includes/sessionconnected.php';

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('img/logo.png',2,2,206,35);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(30);
    // Titre
    // $this->Cell(180,10,'Titre',1,0,'C');
    // Saut de ligne
    $this->Ln(35);
}

// Tableau simple
function BasicTable($header, $data)
{
    // En-tête
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Données
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}







// function headerTable(){
//     $this->setFont('Times','B',8);
//     $this->cell(95,10,'Section: ',1,0,'L');
//     $this->Ln();
// }


function montant($conn){
    $this->setFont('Arial','B',12);
        $this->cell(40,10,'Client',1,0,'L');
        $this->cell(60,10,'Match',1,0,'L');
        $this->cell(25,10,'Date',1,0,'L');
        $this->cell(30,10,'Place',1,0,'L');
        $this->cell(35,10,'Montant paye',1,0,'L');
        $this->Ln();
    $id=$_GET['id'];
    $req=$conn->prepare("SELECT *, t_match.Date as datematch FROM t_payement
                            INNER JOIN t_reservation
                            ON t_payement.CodeReservation=t_reservation.CodeReservation
                            INNER JOIN t_agent
                            ON t_payement.CodeAgent=t_agent.CodeAgent
                            INNER JOIN t_match
                            ON t_reservation.CodeMatch=t_match.CodeMatch
                            INNER JOIN t_equipe
                            ON t_match.Equipe_A=t_equipe.CodeEquipe
                            INNER JOIN t_categorie
                            ON t_reservation.CodeCategorie=t_categorie.CodeCategorie
                            WHERE CodePayement=?");
	$params=array($id);
	$req->execute($params);
    while($data = $req->fetch(PDO::FETCH_OBJ))
    {
        $this->setFont('Arial','B',8);
        $this->cell(40,10,$data->NomClient.' '.$data->PostnomClient,1,0,'L');
        $this->cell(60,10,$data->NomEquipe.' vs '.$data->Equipe_B,1,0,'L');
        $this->cell(25,10,$data->datematch,1,0,'L');
        $this->cell(30,10,$data->Nombre.' places '.$data->Categorie,1,0,'L');
        $this->cell(35,10,$data->Montant.' $',1,0,'L');
        
        $this->Ln();

       
    }
}


function viewTable($conn){
    $this->setFont('Arial','B',12);
}







}

    // Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',8);
    $pdf->AddPage();
    // $pdf->headerTable();
    $pdf->montant($conn);
    
    $pdf->viewTable($conn);
    $pdf->Cell(0,10,'Fait a GOMA, le '.date('d-m-Y'),0,1);
    $pdf->Output();
?>