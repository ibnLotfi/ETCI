<?php 
$titre = "Accueil";
require 'header.php'; 
?>



<div id="main">
    
    <!-- Header and Title -->
    <div id="entete">
        <h1>Recherche d'Etat Civil</h1>
    </div>

    <!-- Liste des premieres lettres de villes-->
    <div id="listeLettres">
        <ul>
            <li>
                <a href=""> A </a>
            </li>
            <li>
                <a href=""> B </a>
            </li>
            <li>
                <a href=""> C </a>
            </li>
        </ul>
    </div>

    <!-- Liste des villes par lettre-->
    <div id="listeVilles">
        <ul>
            <li>
                <a href=""> Amiens </a> 
            </li>
            <li>
                <a href=""> Angers </a> 
            </li>
            <li>
                <a href=""> Antibes </a> 
            </li>
        </ul>
    </div>

</div>

<a href="recherche.php">Page de recherche</a>



<?php require 'footer.php'; ?>