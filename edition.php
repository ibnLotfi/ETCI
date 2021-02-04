<?php
require 'libs/fpdf182/fpdf.php';
//require('libs/fpdf182/fpdf.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Cell(30,10,"Extrait d'Acte de Naissance",1,0,'C');
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Variables propres a la date
$today = date("ddd-mmm-YYYY");

$now = date("H:i"); 

// Variables propre a la personne


// Instanciation de la classe dérivée


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12,1,1,'C');
$pdf->Cell(0,10,'Le 23 Mai 1994',1,1,'L');
$pdf->Cell(0,10,'Est né ' . $prenom . ' ' . $nom . ', à El GOlaa, Wilaya de Kebili en Tunisie',1,1,'L');
$pdf->Cell(0,10,'De sexe masculin',1,1,'L');
$pdf->Cell(0,10,'',1,1,'L');
$pdf->Cell(0,10,'',1,1,'L');
$pdf->Cell(0,10,'Extrait delivré selon le procédé numerisé',1,1,'L');
$pdf->Cell(0,10,'A Melun, délivré le : ' . $today . ' à ' . $now  ,1,1,'L');
$pdf->Output();
?>