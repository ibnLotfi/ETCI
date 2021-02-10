<?php

// les données du serveur MYSQL
$servername = "localhost";
$user = "root";
$pass = "jongoBONGO88/";

//La requête SQL pour verifier s'il existe un utilisateur dans la ville renseigné et coincidant avec les nom,prenoms,genre renseignées 
$allViles = "SELECT * from villes";

try{
  $db = new PDO('mysql:host=localhost;dbname=ETCI', $user, $pass);
  if(($db->query($query)->rowCount()) == 0){
    echo 'pas d\'entree existante';
  }
  else {
    foreach($db->query($query) as $row){
            // -->
            }
  }

} catch (PDOException $e) {
  print $e->getMessage();
}
