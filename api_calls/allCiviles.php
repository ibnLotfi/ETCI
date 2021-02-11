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
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);

  foreach($result as $row) {
    $data[] = array( 
       "id"=>$row['id'],
       "prenom"=>$row['prenom'],
       "nom"=>$row['nom'],
       "date_of_birth"=>$row['date_of_birth'],
       "date_of_death"=>$row['date_of_death'],
       "city_Id"=>$row['city_Id'],
       "isMale"=>$row['isMale']
    );
 }

  //echo json_encode($data);
  echo json_encode($data);

} catch (PDOException $e) {
  print $e->getMessage();
}
