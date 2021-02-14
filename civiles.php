<?php 
$titre = "Civiles";
require 'header.php'; 
require_once 'api_calls/select_allVilles.php'; 
?>

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
