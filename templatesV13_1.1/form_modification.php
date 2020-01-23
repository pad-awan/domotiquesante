<?php

//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V13_1.1;charset=utf8','root','');

//preparer la requete modifier SELECT * FROM

$pdoStat = $bdd->prepare('SELECT * FROM TE_PERSONNEPHYSIQUE_PRS WHERE PRS_ID =:num');

//lier du parametre nommé

$pdoStat->bindValue(':num', $_GET['numContact'], PDO::PARAM_INT);

//executer la requete

$executeIsOk = $pdoStat->execute();
//on récupère le contact

$contact = $pdoStat->fetch();

//var_dump($contact);
?>

<!doctype html>

<html lang="fr">

<head>
 <meta charset="UTF-8">
  <meta name ="viewport"
        content ="width-device-width, user-scalable =no, initial-scalable=1.0, maximum-scale = 1.0, minimum-scale=1.0">
  <meta http-equiv ="X-UA-Compatible" content="ie-edge">
  <h1><title>form_modification</title></h1>
  <link ref="stylesheet" href="css/wing.css"/>
  <td colspan=3 align="center" bgcolor="#0000FF">
    <img width="15%" height="15%" src="img/logoOBJETDOMOTIQUE.jpeg" align="center" valign="top" alt="logo OBJETDOMOTIQUE">
  <!--<link ref="stylesheet" href="css/style.css"/>-->

  </head>
  <body>
    <th align="center" width=90% height=10% border="1"><h1>Modifier un contact</h1></th>
      <form action="modifier.php" method="POST" >
        <input type="hidden" name="numContact" value="<?$contact['PRS_ID']?>">
         <table align="center" border="1">
        <tr>
          <td>
            <p>
          <label for "PRS_ID">id</label>
            <input id="PRS_ID" type="integer" name="PRS_ID" placeholder="id" value="<?= $contact['PRS_ID'];?>">
            </p>
          </td>
        </tr>
        <tr>
          <td>
            <p>
              <label for "PRS_NOM">Nom</label>
              <input id="PRS_NOM" type="text" name="PRS_NOM" placeholder="Nom" value="<?= $contact['PRS_NOM'];?>">
            </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_PRENOM">Prénom</label>
            <input id="PRS_PRENOM" type="text" name="PRS_PRENOM" placeholder="Prénom" value="<?= $contact['PRS_PRENOM'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "GEN_ID">Genre</label>
            <input id="GEN_ID" type="Integer" name="GEN_ID" placeholder="Saisir 1 pour HOMME 2 pour FEMME" value="<?= $contact['GEN_ID'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_NOTES">Remarques</label>
            <input id="PRS_NOTES" type="text" name="PRS_NOTES" placeholder="remarques" value="<?= $contact['PRS_NOTES'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "STT_ID">Statut</label>
            <input id="STT_ID" type="Integer" name="STT_ID" placeholder="statut" value="<?= $contact['STT_ID'];?>">
          </p>
        </td>
      </tr>
      </tr>
        <tr><td><h1><input type ="submit" value="Enregistrer les modifications"/></h1></td></tr>
        </table>
      </form>
  </body>
</html>
