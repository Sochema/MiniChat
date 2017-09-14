<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
  die('Erreur: '. $e->getMessage());
}

$requete = $bdd -> prepare('INSERT INTO mini_chat (pseudo, message) VALUE (:pseudo, :message)');
$requete -> execute(array(
  'pseudo' => $_POST['pseudo'],
  'message' => $_POST['message']
));

$requete -> closeCursor();

header('location: mini_chat.php');
if(header("refresh:0")){
  $bdd -> exec('DELETE * FROM mini_chat');
}

 ?>
