<?php

// les données du serveur MYSQL
$servername = "localhost";
$user = "root";
$pass = "jongoBONGO88/";

//La requête SQL pour verifier s'il existe un utilisateur dans la ville renseigné et coincidant avec les nom,prenoms,genre renseignées 
$allViles = "SELECT * from villes";

try{
  $db = new PDO('mysql:host=localhost;dbname=ETCI', $user, $pass);
  $sth = $db->prepare($allViles);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);

  foreach($result as $row) {
    $data[] = array( 
       "id"=>$row['id'],
       "nom"=>$row['nom']
    );
 }

  //echo json_encode($data);
  echo json_encode($data);

} catch (PDOException $e) {
  print $e->getMessage();
}
