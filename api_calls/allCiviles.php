<?php

// les données du serveur MYSQL
$servername = "localhost";
$user = "root";
$pass = "jongoBONGO88/";

//La requête SQL pour verifier s'il existe un utilisateur dans la ville renseigné et coincidant avec les nom,prenoms,genre renseignées 
$allCiviles = "SELECT * from civiles";

try{
  $db = new PDO('mysql:host=localhost;dbname=ETCI', $user, $pass);
  $sth = $db->prepare($allCiviles);
  $sth->execute();
  $data = $sth->fetchAll(PDO::FETCH_ASSOC);

  //return json_encode($data);
  return $data;

} catch (PDOException $e) {
  print $e->getMessage();
}
