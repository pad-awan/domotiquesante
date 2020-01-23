<?php
//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V13_1.1;charset=utf8','root','');

//préparation de la requete d'insertion (SQL)

$pdoStat = $bdd->prepare('SELECT * FROM T_E_PERSONNEPHYSIQUE_PRS ORDER BY PRS_ID ASC');

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
   <title>Liste des contacts</title>
   <link rel="stylesheet" href="css/wing.css"/>
 </head>
   <body>
     <img src="img/logoOBJETDOMOTIQUE.jpeg" background-repeat="no-repeat" align="center" valign="middle" alt="logoOBJETDOMOTIQUE">
     <form action="" method="POST" colspan="3" >
       <table class="table" align="left" border="1">
     <thead><h1>Liste des contacts</h1>
       <h2>
         <th>id</th>
         <th>Nom</th>
         <th>Prénom</th>
         <th>Genre</th>
         <th>Notes</th>
         <th>Statut</th>
       </h2>
      </thead>
     <tbody>
       <?php foreach ($contacts as $contact): ?>
        <li>
          <tr>
            <td><?= $contact['PRS_ID'] ?></td>
            <td><?= $contact['PRS_NOM'] ?></td>
            <td><?= $contact['PRS_PRENOM'] ?></td>
            <td><?= $contact['GEN_ID'] ?></td>
            <td><?= $contact['PRS_NOTES'] ?></td>
            <td><?= $contact['STT_ID'] ?></td>
            <td><a href="supprimer.php?numContact=<?= $contact['PRS_ID'] ?>">Supprimer le contact</a></td>
            <td><a href="form_modification.php?numContact=<?= $contact['PRS_ID'] ?>">Modifier le contact</a></td>
          </tr>
      </li>

       <?php endforeach; ?>
     </tbody>

       <a href="index.php">Insérer un contact</a></br>
       <a href="indexadresse.php">associer une adresse</a></br>
       <a href="listeradresse.php">lister les adresses</a></br>
   </table>
   </form>


   </body>
 </html>
