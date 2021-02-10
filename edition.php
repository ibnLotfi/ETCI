<?php
require 'libs/fpdf182/fpdf.php';
//require('libs/fpdf182/fpdf.php');


//Variables necessaire a l'edition du PDF
$today = date("d-M-y");
$now = date("H:i"); 

// **************************************************************************
//    EXTENSION DE LA CLASS FPDF POUR L'UTILISER AVEC NOS PROPRES REGLAGES  *
// **************************************************************************

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

// **************************************************************************
//    EXTENSION DE LA CLASS FPDF POUR L'UTILISER AVEC NOS PROPRES REGLAGES  *
// **************************************************************************


// les données envoyé par le formulaire précedent 
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$annee = $_POST['date'];
$idVille = $_POST['idVille'];


// les données du serveur MYSQL
$servername = "localhost";
$user = "root";
$pass = "jongoBONGO88/";

//La requête SQL pour verifier s'il existe un utilisateur dans la ville renseigné et coincidant avec les nom,prenoms,genre renseignées 
$query = "SELECT * from civiles as c 
join villes as v 
on c.city_Id = v.id 
where c.nom = '$nom'
and c.prenom = '$prenom'
and c.isMale = $sexe
and v.id = $idVille;
";


// DEBUT DU CODE 
try{
  $db = new PDO('mysql:host=localhost;dbname=ETCI', $user, $pass);
  if(($db->query($query)->rowCount()) == 0){
    echo 'pas d\'entree existante';
  }
  else {
    foreach($db->query($query) as $row){

      //on va stcoker l'id du civile et les autres données
      $idCivile = $row['0'];
      $ville_rens =  $row['8'];

      // on instancie les deux requetes pour comparer la date renseigner avec les dates stockées en BDD
      $deadQuery = "SELECT * from civiles 
                    where DATE_FORMAT(date_of_death, '%Y') = '$annee'
                    AND id = $idCivile";

      $birthQuery = "SELECT * from civiles 
                    where DATE_FORMAT(date_of_birth, '%Y') = '$annee'
                    AND id = $idCivile";

      // on va verifier si la date renseigné correspond eventuellement a sa mort
      // puis on edit l'extrait d'acte de deces
            $sth = $db->prepare($deadQuery);
            $sth->execute();
            $result = $sth->fetchAll();
            if(count($result) > 0) {
              if($result[0]['isMale'] == 1){
                $genre = "masculin";
              }else{
                $genre = "féminin";
              }
              // FOrmatage de la date mysql en date francaise de type jour 01 mois annee 
              // voir : https://php.developpez.com/faq/?page=dates
              setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
              // echo strftime("%A %d %B %G", strtotime( $result[0]['date_of_death'])); 
              // On va generer le PDF
              ob_start ();
              $pdf = new PDF();
              $pdf->AliasNbPages();
              $pdf->AddPage();
              $pdf->SetFont('Times','',12,1,1,'C');
              $pdf->Cell(0,10,'Le ' . strftime("%A %d %B %G", strtotime( $result[0]['date_of_death'])),1,1,'L');
              $pdf->Cell(0,10,utf8_decode('Est décédé ' . $result[0]['prenom'] . ' ' . $result[0]['nom'] . ', à ' . $ville_rens),1,1,'L');
              $pdf->Cell(0,10,utf8_decode('De sexe ' . $genre ),1,1,'L');
              $pdf->Cell(0,10,'',1,1,'L');
              $pdf->Cell(0,10,'',1,1,'L');
              $pdf->Cell(0,10,utf8_decode('Extrait delivré selon le procédé numerisé'),1,1,'L');
              $pdf->Cell(0,10,utf8_decode('A Melun, délivré le : ' . strftime("%A %d %B %G", strtotime( date("d-M-y"))) . ' à ' . $now ) ,1,1,'L');
              $pdf->Output();
              ob_end_flush();
            }
            else{
              echo "pas d'entrée existante pour l'année renseigné";
            }
           

      // on va verifier si la date rensigné corresepond a sa naissance
      // puis on edit l'extrait d'acte de naissance

            $sth = $db->prepare($birthQuery);
            $sth->execute();
            $result = $sth->fetchAll();
            if(count($result) > 0) {
              if($result[0]['isMale'] == 1){
                $genre = "masculin";
              }else{
                $genre = "féminin";
              }
              // FOrmatage de la date mysql en date francaise de type jour 01 mois annee 
              // voir : https://php.developpez.com/faq/?page=dates
              setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
              // echo strftime("%A %d %B %G", strtotime( $result[0]['date_of_birth']));
              // On va generer le PDF
              ob_start ();
              $pdf = new PDF();
              $pdf->AliasNbPages();
              $pdf->AddPage();
              $pdf->SetFont('Times','',12,1,1,'C');
              $pdf->Cell(0,10,'Le ' . strftime("%A %d %B %G", strtotime( $result[0]['date_of_birth'])),1,1,'L');
              $pdf->Cell(0,10,utf8_decode('Est né ' . $result[0]['prenom'] . ' ' . $result[0]['nom'] . ', à ' . $ville_rens),1,1,'L');
              $pdf->Cell(0,10,utf8_decode('De sexe ' . $genre ) ,1,1,'L');
              $pdf->Cell(0,10,'',1,1,'L');
              $pdf->Cell(0,10,'',1,1,'L');
              $pdf->Cell(0,10,utf8_decode('Extrait delivré selon le procédé numerisé'),1,1,'L');
              $pdf->Cell(0,10,utf8_decode('A Melun, délivré le : ' . strftime("%A %d %B %G", strtotime( date("d-M-y"))) . ' à ' . $now )  ,1,1,'L');
              $pdf->Output();
              ob_end_flush();
            }
            else{
              echo "pas d'entrée existante pour l'année renseigné";
            }
            
    }

  }

} catch (PDOException $e) {
  print $e->getMessage();
}



// Instanciation de la classe dérivée

/*
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
*/
?>