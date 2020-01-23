<?php
//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V13_1.1;charset=utf8','root','');

//préparation de la requete d'insertion (SQL)

$pdoStat = $bdd->prepare('SELECT * FROM TR_VILLE_CITY ORDER BY CITY_ID ASC');

//execution de la une requête preparée

$executeIsOk = $pdoStat->execute();

//récupération des résultats en une seule fois .Pour d'autres méthodes, regarder les vidéos adéquates dans la playlist PHP - PDO"
$contacts = $pdoStat->fetchAll();

//var_dump($contacts);une fois éxecutée j'ai vu les différents enregistrements je l'ai mis en commentaire
//var_dump($contacts)
 ?>
 <!doctype html>

 <html lang="fr">

 <head>
 	<meta charset="UTF-8">
   <meta name ="viewport"
         content ="width-device-width, user-scalable =no, initial-scalable=1.0, maximum-scale = 1.0, minimum-scale=1.0">
   <meta http-equiv ="X-UA-Compatible" content="ie-edge">
   <title>Liste des villes</title>
   <link rel="stylesheet" href="css/wing.css"/>
 </head>
   <body>
     <img src="img/logoOBJETDOMOTIQUE.jpeg" background-repeat="no-repeat" align="center" valign="middle" alt="logoOBJETDOMOTIQUE">
     <form action="" method="POST" colspan="3" >
       <table class="table" align="left" border="1">
     <thead><h1>Liste des villes</h1>
       <h2>
         <th>CITY_ID</th>
         <th>CITY_COMMUNE</th>
         <th>CITY_CODEPOSTAL</th>
       </h2>
      </thead>
     <tbody>
       <?php foreach ($contacts as $contact): ?>

          <tr>
            <td><?= $contact['CITY_ID'] ?></td>
            <td><?= $contact['CITY_CODEPOSTAL'] ?></td>
            <td><?= $contact['CITY_COMMUNE'] ?></td>
          </tr>


       <?php endforeach; ?>
     </tbody>
   </table>
   </form>


   </body>
 </html>
