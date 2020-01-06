<?php

//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V12;charset=utf8','root','');

//preparer la requete supprimer DELETE FROM

$pdoStat = $bdd->prepare('DELETE FROM TE_PERSONNE_PRS WHERE PRS_ID =:num LIMIT 1');

//lier du parametre nommé

$pdoStat->bindValue(':num', $_GET['numContact'], PDO::PARAM_INT);

//executer la requete

$executeIsOk = $pdoStat->execute();

//var_dump($contacts)

if($executeIsOk){
  $message = 'Le contact a été supprimé';
}
else{
  $message = 'Echec de la suppression';
}
 ?>
 <!doctype html>

 <html lang="fr">

 <head>
 	<meta charset="UTF-8">
   <meta name ="viewport"
         content ="width-device-width, user-scalable =no, initial-scalable=1.0, maximum-scale = 1.0, minimum-scale=1.0">
   <meta http-equiv ="X-UA-Compatible" content="ie-edge">
   <title>Document</title>
   <link ref="stylesheet" href="css/wing.css"/>

   </head>
   <body>
     <h1>Suppression</h1>
     <p><?= $message ?></p>
     <a href="http://127.0.0.1/API_OBJETDOMO/Flask/templates/lister.php">Retour à la liste des contacts</a>

   </body>
 </html>
