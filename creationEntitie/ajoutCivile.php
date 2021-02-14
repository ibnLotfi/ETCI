<?php 

if($_POST['ville'] === "-1"){
    header("Location: ../addCivile.php?message=Veuillez selectionner une ville");
}
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dateNais = date("Y-m-d H:i:s", strtotime($_POST['dateNais']));
$dateMort = ($_POST['dateMort'] == null) ? null : date("Y-m-d H:i:s",strtotime($_POST['dateMort']));;
$ville = $_POST['ville'];
$sexe = $_POST['sexe'];


// les données du serveur MYSQL
$servername = "localhost";
$user = "root";
$pass = "jongoBONGO88/";

//La requête SQL pour verifier s'il existe un utilisateur dans la ville renseigné et coincidant avec les nom,prenoms,genre renseignées 
$allbbCiviles = "SELECT * from civiles";

$verfiCivile = "SELECT * FROM civiles
WHERE prenom = :prenom
AND nom = :nom
AND date_of_birth = :dateNais
AND date_of_death = :dateMort
AND city_id = :ville
AND isMale = :sexe
";

$data = [
    "prenom" => $prenom,
    "nom" => $nom,
    "dateNais" => $dateNais,
    "dateMort" => $dateMort,
    "ville" => $ville,
    "sexe" => $sexe
];

try{
    $db = new PDO('mysql:host=localhost;dbname=ETCI', $user, $pass);
    $stmt = $db->prepare($verfiCivile);
    $stmt->execute($data);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) > 0){
        header("Location: ../addCivile.php?message=" . $prenom . ' ' . $nom . ' existe déjà dans la base de données');
    }else{
        $stmt = $db->prepare("INSERT INTO CIVILES (prenom,nom,date_of_birth,date_of_death,city_id,isMale) VALUES (:prenom,:nom,:date_of_birth,:date_of_death,:city_id,:isMale)");
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':date_of_birth', $dateNais);
        $stmt->bindParam(':date_of_death', $dateMort);
        $stmt->bindParam(':city_id', $ville);
        $stmt->bindParam(':isMale', $sexe);
        $stmt->execute();
        header("Location: ../addCivile.php?message=" . $prenom . ' ' . $nom . ' as bien été ajouté');
    }   
}catch (PDOException $e) {
    print $e->getMessage();
}

