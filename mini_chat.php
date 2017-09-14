<form action="mini_chatpost.php" method="post">
  <p>Pseudo</p>
  <input type="text" name="pseudo" value="">
  <p>Message</p>
  <input type="text" name="message" value="">
  <input type="submit" name="envoyer" value="Envoyer">
</form>


<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
  die('Erreur: '. $e->getMessage());
}

$requete2 = $bdd -> query('SELECT * FROM mini_chat ORDER BY ID DESC LIMIT 0, 10');

while ($donnees = $requete2->fetch()){

  echo $donnees['pseudo']. " : " . $donnees['message']. "<br />";
}

$requete2 -> closeCursor();
 ?>
