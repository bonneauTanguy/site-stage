<?php
// Connexion à la BDD
$bddname = 'stylfjhq_PPE';
$hostname = '127.0.0.1';
$username = 'stylfjhq';
$password = 'QyaEb2F6VSJemd';
$db = mysqli_connect ($hostname, $username, $password, $bddname);



// Appel de la librairie FPDF
require("fpdf.php");

// Création de la class PDF
class PDF extends FPDF {
    // Header
    function Header() {
        $this->Ln(20);
    }
}

// Activation de la classe
$pdf = new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Helvetica','',11);
$pdf->SetTextColor(0);

// Position de l'entête à 10mm des infos (48 + 10)
$position_entete = 58;

function entete_table($position_entete){
    global $pdf;
    $pdf->SetDrawColor(183); // Couleur du fond
    $pdf->SetFillColor(221); // Couleur des filets
    $pdf->SetTextColor(0); // Couleur du texte
    $pdf->SetY($position_entete);
    $pdf->SetX(8);
    $pdf->Cell(30,8,'id_prestation',1,0,'C',1);
    $pdf->SetX(38);
	$pdf->Cell(30,8,'nomPrestation',1,0,'C',1);
    $pdf->SetX(68);
	$pdf->Cell(30,8,'prix',1,0,'C',1);
    $pdf->SetX(98);
	$pdf->Cell(30,8,'annee',1,0,'C',1);
    $pdf->SetX(128);
    $pdf->Ln(); // Retour à la ligne
}
entete_table($position_entete);

// Liste des détails
$position_detail = 66; // Position à 8mm de l'entête

$req2 = "SELECT * FROM prestation INNER JOIN tarifer ON id_prestation = id_item";
$rep2 = mysqli_query($db, $req2);
while ($row2 = mysqli_fetch_array($rep2)) {
    $pdf->SetY($position_detail);
    $pdf->SetX(8);
    $pdf->MultiCell(30,8,utf8_decode($row2['id_prestation']),1,'C');
    $pdf->SetY($position_detail);
    $pdf->SetX(38);
    $pdf->MultiCell(30,8,$row2['libelle'],1,'C');
    $pdf->SetY($position_detail);
    $pdf->SetX(68);
    $pdf->MultiCell(30,8,$row2['prix'],1,'C');
	$pdf->SetY($position_detail);
    $pdf->SetX(98);
    $pdf->MultiCell(30,8,$row2['annee'],1,'C');
	$pdf->SetY($position_detail);
    $pdf->SetX(128);
	$position_detail += 8;

}

// Nom du fichier
$nom = 'prestation'.'.pdf';

// Création du PDF
$pdf->Output($nom,'I');?>

<a href='fichier.pdf'>Fichier PDF</a>