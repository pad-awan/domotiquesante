<?php
//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V12;charset=utf8','root','');

//préparation de la requete d'insertion (SQL)

$pdoStat = $bdd->prepare('SELECT * FROM TE_PERSONNE_PRS ORDER BY PRS_ID ASC');

//execution de la une requête preparée

$executeIsOk = $pdoStat->execute();

//récupération des résultats en une seule fois .Pour d'autres méthodes, regarder les vidéos adéquates dans la playlist PHP - PDO"
$contacts = $pdoStat->fetchAll();

//var_dump($contacts);un fois éxecutée j'ai vu les différents enregistrements je l'ai mis en commentaire
//var_dump($contacts)
 ?>
 <!doctype html>

 <html lang="fr">

 <head>
 	<meta charset="UTF-8">
   <meta name ="viewport"
         content ="width-device-width, user-scalable =no, initial-scalable=1.0, maximum-scale = 1.0, minimum-scale=1.0">
   <meta http-equiv ="X-UA-Compatible" content="ie-edge"

   <title>Document</title>
   <link rel="stylesheet" href="css/wing.css"/>
 </head>
   <body>
     <h1>Liste des contacts</h1>

     <ul>
       <?php foreach ($contacts as $contact): ?>
         <li>
           <tr><?= $contact['PRS_ID'] ?> <?= $contact['PRS_NOM'] ?> - <?= $contact['PRS_PRENOM'] ?> - <?= $contact['TTR_ID'] ?> - <?= $contact['AUTH_ID'] ?> -
           <?= $contact['PRS_DATENAISSANCE'] ?> - <?= $contact['PRS_DEBCONTRAT'] ?> - <?= $contact['PRS_TEL1'] ?> - <?= $contact['PRS_TEL2'] ?> -
           <?= $contact['PRS_MAIL1'] ?> - <?= $contact['PRS_MAIL2'] ?> - <?= $contact['PRS_NOTES'] ?> - <?= $contact['STT_ID'] ?> - <?= $contact['AUT_ID'] ?>
           <a href="supprimer.php?numContact=<?= $contact['PRS_ID'] ?>">Supprimer</a>
           <a href="form_modification.php?numContact=<?= $contact['PRS_ID'] ?>">Modifier</a>
         </li></tr>
     <?php endforeach; ?>
    </ul>

   </body>
 </html>
