<?php

session_start();
$nom=(!isset($_POST["login"])) ? 'null' : $_POST["login"];
$pass=(!isset($_POST["password"])) ? 'null' : $_POST["password"];
$data = [
    "nom" => $nom,
    "pass" => $pass
];


$dsn = 'mysql:dbname=ETCI;host=localhost';
$user = 'root';
$password = 'jongoBONGO88/';

try {
    $db = new PDO($dsn, $user, $password);
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE nom=:nom AND pass=:pass");
    $stmt->execute($data);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($result)>0){
        $_SESSION['autoriser']="oui";
        header("location:index.php");
    }
    else{
        //header("location:auth.php?message=identifiants non valides");
        $_POST["message"] = "identifiants non valides";
    }
    
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>
            ETCI Accueil
        </title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body class="allRed">

<div id="authentification">
    <div id="top">
        <h1>ETCI</h1>
        <img src="logo.png" alt="logo">
        <p style="color:red;">
            <?php if(isset($_POST["message"])) { echo $_POST["message"];} else {echo "";};?>
        </p>
    </div>
    <div id="center">
        <form action="" method="POST">
                <label for="login">Identifiant</label>
                <input type="text" name="login" placeholder="admin@admel.fr">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" placeholder="mot de passe">
                <input type="submit" value="Connexion" id="authButton">
        </form>
    </div>
    <div id="bottom">

    </div>
</div>

</body>
</html>