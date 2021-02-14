<?php 
$titre = "Civiles";
require 'header.php'; 
require_once 'api_calls/select_allVilles.php'; 
?>


<div id='message' style="margin-top=10px;color:red;">
    <?php 
        if(isset($_GET['message'])){
            echo $_GET['message'];
            echo " !";
        }
    ?>
</div>

<div id="form_ajout_civile">
    <form action="creationEntitie/ajoutCivile.php" method="POST">
            <h2 style='text-align : center'>Ajout nouveau civile</h2>
            <div>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            </div>
            <div>
                <label for="dateNais">Date de naissance :</label>
                <input type="datetime-local" id="dateNais" name="dateNais" min="1800-06-07T00:00" max="2021-06-07T00:00" required>
                <label for="dateMort">Date de décès (optionel) :</label>
                <input type="datetime-local" id="dateMort" name="dateMort" min="1800-06-07T00:00" max="2021-06-07T00:00">
            </div>
            <div>
                <fieldset>
                    <legend>Sexe :</legend>
                    <label for="masculin">Masculin</label>
                    <input type="radio" name="sexe" id="masculin" value="1" required>
                    <label for="feminin">Feminin</label>
                    <input type="radio" name="sexe" id="feminin" value="0" required>
                    
                </fieldset>
                <fieldset style="margin-top:10px">
                    <legend>Ville :</legend>
                    <select name="ville" id="ville">
                        <option value="-1">-- Veuillez selectionner une ville --</option>
                        <?php
                            SelectAllVilles()
                        ?>
                    </select>
                </fieldset>
                
            </div>
           
            <div>
                <input type="submit" class="retour" name="" value="Envoyer" id="" placeholder="">
            </div>
    </form>
</div>

<?php require 'footer.php'; ?>
