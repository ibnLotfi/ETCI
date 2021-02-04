<?php 
$titre = "Recherche";
require 'header.php'; 
?>

<div>

    <h2>Rechercher un Etat civile pour : </h2>
    <form method="POST" action="edition.php">

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" placeholder="Entrez nom ...">

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" placeholder="Entrez prénom ...">

        <button type="submit">Soumettre</button>

    </form>

</div>

<a href="index.php">Précedent</a>

<?php require 'footer.php'; ?>