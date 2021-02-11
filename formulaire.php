<?php 
$titre = "Formulaire";
require 'header.php'; 




if(!isset($_GET['id'])){
    $idVille = 0;
}
else{
    $idVille = $_GET['id'];
}


?>


<form action="edition.php" method="POST" id="formulaire" target="_blank">
    <h2>Formulaire de demande d'Etat civile</h2>
    <h3>Ville : <?= $_GET['ville']?></h3>
    <ul>
        <li>
            <input type="hidden" name="idVille" value="<?=$idVille?>">
        </li>

        <li>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
        </li>

        <li>
            <label for="prenom">Prénom :</label>     
            <input type="text" name="prenom" id="prenom" required>
        </li>

        <li>
            <h5>Sexe :</h5>
            <input type="radio" name="sexe" id="masculin" value="1" required>
            <label for="masculin">Masculin</label>

            <br>

            <input type="radio" name="sexe" id="feminin" value="0" required>
            <label for="feminin">Feminin</label>
        </li>

        <li>
            <label for="date">Année :</label>
            <input type="number" id="date" name="date" min="1880" max="2021" required>
        </li>

        <li>
            <input type="submit" value="Soumettre" class="btn">
        </li>
    
    
    </ul>
    

</form>

<br>

<a href="index.php" class="btn">Retour</a>



<?php require 'footer.php'; ?>