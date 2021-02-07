<?php
$servername = "localhost";
$user = "root";
$pass = "jongoBONGO88/";





// Create connection
/* try {
    $dbh = new PDO('mysql:host=localhost;dbname=ETCI', $user, $pass);
    foreach($dbh->query('SELECT * from villes') as $row) {
        //print_r($row);
        echo $row["nom"];
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
}
*/

function get_all_cities($char){
  $servername = "localhost";
  $user = "root";
  $pass = "jongoBONGO88/";
  $query = "SELECT * FROM VILLES WHERE LOWER(nom) LIke '" . $char . "%'";
  $tab;
  try{
    $db = new PDO('mysql:host=localhost;dbname=ETCI', $user, $pass);
    foreach($db->query($query) as $row){
      $id= $row['id'];
      $nom= $row['nom'];
      if(isset($row)){
        echo "<li><form action='formulaire.php' method='GET'> <input type='hidden' name='id' value='$id'> <input type='submit' name='ville' value='$nom'> </form> </li>";
        //echo "<p> $id --- $nom </P>";
      }
      
    }
    if(($db->query($query)->rowCount()) == 0){
      echo 'pas de ville qui commence par la lettre ' . $char;
    }
   
  } catch (PDOException $e) {
    print $e->getMessage();
  }

}


?>