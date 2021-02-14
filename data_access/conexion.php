<?php
$dsn = 'mysql:dbname=ETCI;host=localhost';
$user = 'root';
$password = 'jongoBONGO88/';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>