<?php




function SelectAllVilles(){
    try{
        // les données du serveur MYSQL
        $servername = "localhost";
        $user = "root";
        $pass = "jongoBONGO88/";
        //La requête SQL pour verifier s'il existe un utilisateur dans la ville renseigné et coincidant avec les nom,prenoms,genre renseignées 
        $allVilles = "SELECT * from villes";
        $db = new PDO('mysql:host=localhost;dbname=ETCI', $user, $pass);
        $sth = $db->prepare($allVilles);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $id = $row['id'];
            $nom = $row['nom'];
          echo "<option value='$id'> $nom </option>";
       }
      } catch (PDOException $e) {
        print $e->getMessage();
      }
}

