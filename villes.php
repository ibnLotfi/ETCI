<?php 
$titre = "Civiles";
require 'header.php'; 
?>


<div id='message' style="margin-top=10px;color:red;">
    <?php 
        if(isset($_GET['message'])){
            echo $_GET['message'];
            echo " !";
        }
    ?>
</div>

<div id="form_ajout_ville">
    <form action="creationEntitie/ajoutVille.php" method="POST">
            <h2 style='text-align : center'>Ajout nouvelle ville</h2>
            <div>
                <label for="nom"></label>
                <input type="text" name="nom" id="nom" placeholder="Nom">
            </div>
            <div>
                <input type="submit" class="retour" name="" value="Envoyer" id="" placeholder="">
            </div>
    </form>
</div>

<div id="table">
    <h2 style='text-align : center'>Liste des villes</h2>
    <table id="table_id" class="display" style="width:100%;height:450px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Nom</th>
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
        ajax:{url:"api_calls/allVilles.php",dataSrc:""},
        //"ajax": "api_calls/allCiviles.php",
        "columns": [
            { "data": "id" },
            { "data": "nom" }
        ]
    } );
       
} );

</script>    
