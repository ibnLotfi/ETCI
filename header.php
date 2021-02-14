<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>
        <?php 
            if($titre) echo $titre;
            else echo 'ETCI alpha';
        ?>
        </title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    </head>
    <body>
    <header>
      <ul>
          <li><a href="index.php">Etat Civile</a></li>
          <li><a href="civiles.php">Liste des Personnes</a></li>
          <li><a href="addCivile.php">Ajouter une Personne</a></li>
          <li><a href="villes.php">Liste Villes</a></li>
      </ul>
	</header> 

    