<?php
//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V13_1.1;charset=utf8','root','');

//préparation de la requete d'insertion (SQL)

$pdoStat = $bdd->prepare('SELECT * FROM TE_ADRESSEPOSTALE_ADR ORDER BY ADR_ID ASC');

//execution de la une requête preparée

$executeIsOk = $pdoStat->execute();

//récupération des résultats en une seule fois .Pour d'autres méthodes, regarder les vidéos adéquates dans la playlist PHP - PDO"
$adresses = $pdoStat->fetchAll();

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
   <title>Liste des adresses</title>
   <link rel="stylesheet" href="css/wing.css"/>
 </head>
   <body>
     <img src="img/logoOBJETDOMOTIQUE.jpeg" background-repeat="no-repeat" align="center" valign="middle" alt="logoOBJETDOMOTIQUE">
     <form action="" method="POST" colspan="3" >
       <table class="table" align="left" border="1">
     <thead><h1>Liste des adresses</h1>
       <h2>
         <th>id</th>
         <th>VOIEPRINCIPALE</th>
         <th>COMPLEMENTIDENTIFICATION</th>
         <th>Ville</th>
         <th>Typeadresse</th>
       </h2>
      </thead>
     <tbody>
       <?php foreach ($adresses as $adresse): ?>
        <li>
          <tr>
            <td><?= $adresse['ADR_ID'] ?></td>
            <td><?= $adresse['ADR_VOIEPRINCIPALE'] ?></td>
            <td><?= $adresse['ADR_COMPLEMENTIDENTIFICATION'] ?></td>
            <td><?= $adresse['CITY_ID'] ?></td>
            <td><?= $adresse['TAD_ID'] ?></td>
            <td><a href="supprimer.php?numAdresse=<?= $contact['ADR_ID'] ?>">Supprimer l'adresse'</a></td>
            <td><a href="form_modifadresse.php?numAdresse=<?= $contact['ADR_ID'] ?>">Modifier l'adresse'</a></td>
          </tr>
      </li>

       <?php endforeach; ?>
     </tbody>
       <a href="indexadresse.php">Insérer une adresse</a></br>
       <a href="listeradresse.php">lister les adresses</a>
       <a href="lister.php">lister les contacts</a>
   </table>
   </form>


   </body>
 </html>
