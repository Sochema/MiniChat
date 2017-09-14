<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MINI-CHAT</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="icon" href="favicon.ico" />
        <!-- Fontawesome Link-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
      <body>

        <header>
          <h1>Mini-Chat</h1>
        </header>


<form class="formulaire" action="mini_chatpost.php" method="post">
  <p>Pseudo</p>
  <input type="text" required="true" name="pseudo" value="">
  <p>Message</p>
  <input type="text" class="msg" required="true" name="message" value="">
  <input type="submit" class="my-4 btn btn-outline-info" name="envoyer" value="Send">
</form>


<?php

//CONNEXION BASE DE DONNEES
try{
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
  die('Erreur: '. $e->getMessage());
}

  //LANCEMENT DE REQUÊTE
$requete2 = $bdd -> query('SELECT * FROM mini_chat ORDER BY ID DESC LIMIT 0, 10');

while ($donnees = $requete2->fetch()){

  echo "<div class='chat'> <p><em id='pseudo'>" .htmlspecialchars($donnees['pseudo']). "</em> : " . htmlspecialchars($donnees['message']). "</p></div>";
}
$requete2 -> closeCursor();

 ?>


 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
 <script src="js/plugins.js"></script>
 <script src="js/main.js"></script>

 <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
 <script>
     (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
     function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
     e=o.createElement(i);r=o.getElementsByTagName(i)[0];
     e.src='https://www.google-analytics.com/analytics.js';
     r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
     ga('create','UA-XXXXX-X','auto');ga('send','pageview');
 </script>
 <script src="js/bootstrap.js"></script>
 </body>
 </html>
