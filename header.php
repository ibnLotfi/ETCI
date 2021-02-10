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
    </head>
    <body>
    <header>
      <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="civiles.php">Etat Civile</a></li>
          <li><a href="civiles.php">Civiles</a></li>
          <li><a href="villes.php">Villes</a></li>
      </ul>
	</header> 

    