<?php 
$titre = "Accueil";
require 'header.php'; 
require_once 'fonctions.php';


if(!isset($_GET['char'])){
  $char = "a";
}else{
  $char = $_GET['char'];
}
?>



<div id="main">
    
    <!-- Header and Title -->
    <div id="entete">
        <h1>Recherche d'Etat Civil</h1>
    </div>

    <!-- Liste des premieres lettres de villes-->
    <div id="listeLettres">
        <ul>
            <?php
                $letters = range('a', 'z');
                foreach( $letters as $letter){
                   $charac = strtoupper ( $letter );
                   echo "<li> <form method='GET' action='index.php'> <input type='submit' name='char' value='$charac'> </form> </li>";
                }
            ?>
        </ul>
    </div>

    <!-- Liste des villes par lettre-->
    <div id="listeVilles">
        <ul>
            <?php
            get_all_cities($char);    
            ?>
        </ul>
    </div>

</div>



<?php require 'footer.php'; ?>