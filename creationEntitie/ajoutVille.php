<?php 
$nom = strtoupper($_POST['nom']);


// les données du serveur MYSQL
$servername = "localhost";
$user = "root";
$pass = "jongoBONGO88/";


$verfiVille = "SELECT * FROM villes
WHERE nom = :nom";


try{
    $db = new PDO('mysql:host=localhost;dbname=ETCI', $user, $pass);
    $stmt = $db->prepare($verfiVille);
    $stmt->execute(["nom"=>$nom]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) > 0){
        header("Location: ../villes.php?message=La ville de : " . $nom . ' existe déjà dans la base de données');
    }else{
        $stmt = $db->prepare("INSERT INTO Villes (nom) VALUES (:nom)");
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
        header("Location: ../villes.php?message=La ville de : " . $nom . ' as bien été ajouté');
    }   
}catch (PDOException $e) {
    print $e->getMessage();
}

