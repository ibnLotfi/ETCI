<?php 
$titre = "Civiles";
require 'header.php'; 


?>

<div id="form_ajout_civile">
    <form action="">
            <h2 style='text-align : center'>Ajout nouveau civile</h2>
            <div>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" placeholder="Nom">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom">
            </div>
            <div>
                <label for="dateNais">Date de naissance :</label>
                <input type="date" id="dateNais" name="date" min="1880" max="2021" required>
                <label for="dateMort">Date de décès (optionel) :</label>
                <input type="date" id="dateMort" name="date" min="1880" max="2021" required>
            </div>
            <div>
                <label for="masculin">Masculin</label>
                <input type="radio" name="sexe" id="masculin" value="1" required>
                <label for="feminin">Feminin</label>
                <input type="radio" name="sexe" id="feminin" value="0" required>
                <label for="ville">Ville :</label>
                <select name="ville" id="ville">
                    <option>Paris</option>
                    <option>Lyon</option>
                    <option>Lille</option>
                </select>
            </div>
           
            <div>
                <input type="submit" class="retour" name="" value="Envoyer" id="" placeholder="">
            </div>
    </form>
</div>

<div id="table">
    <h2 style='text-align : center'>Liste des civiles</h2>
    <table id="table_id" class="display" style="width:100%;height:450px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Naissance</th>
                <th>Décès</th>
                <th>Code Ville</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Naissance</th>
                <th>Décès</th>
                <th>Code Ville</th>
                <th>Genre</th>
            </tr>
        </tfoot>
    </table>
</div>


<!--
<form action="edition.php" method="POST" id="formulaire" target="_blank">
    <h2>Gestions des civiles</h2>
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
            <input type="submit" value="Soumettre">
        </li>
    
    
    </ul>
    

</form>

-->


<?php require 'footer.php'; ?>
<script>
    
  

    $(document).ready( function () {
        $('#table_id').DataTable({
        ajax:{url:"api_calls/allCiviles.php",dataSrc:""},
        //"ajax": "api_calls/allCiviles.php",
        "columns": [
            { "data": "id" },
            { "data": "prenom" },
            { "data": "nom" },
            { "data": "date_of_birth" },
            { "data": "date_of_death" },
            { "data": "city_Id" },
            { "data": "isMale" }
        ]
    } );
       
} );

</script>    
