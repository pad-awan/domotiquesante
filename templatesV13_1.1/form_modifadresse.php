<?php

//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V13_1.1;charset=utf8','root','');

//preparer la requete modifier SELECT * FROM

$pdoStat = $bdd->prepare('SELECT * FROM TE_ADRESSEPOSTALE_ADR WHERE ADR_ID =:numA');

//lier du parametre nommé

$pdoStat->bindValue(':numA', $_GET['numAdresse'], PDO::PARAM_INT);

//executer la requete

$executeIsOk = $pdoStat->execute();
//on récupère le contact

$adresse = $pdoStat->fetch();

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
    <th align="center" width=90% height=10% border="1"><h1>Modifier une adresse</h1></th>
      <form action="modifieradresse.php" method="POST" >
        <input type="hidden" name="numAdresse" value="<?$adresse['ADR_ID']?>">
         <table align="center" border="1">
        <tr>
          <td>
            <p>
          <label for "ADR_ID">id</label>
            <input id="ADR_ID" type="integer" name="ADR_ID" placeholder="id" value="<?= $contact['ADR_ID'];?>">
            </p>
          </td>
        </tr>
        <tr>
          <td>
            <p>
              <label for "ADR_VOIEPRINCIPALE">Voie principale</label>
              <input id="ADR_VOIEPRINCIPALE" type="text" name="ADR_VOIEPRINCIPALE" placeholder="Voie principale" value="<?= $contact['ADR_VOIEPRINCIPALE'];?>">
            </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "ADR_COMPLEMENTIDENTIFICATION">Complément d'adresse</label>
            <input id="ADR_COMPLEMENTIDENTIFICATION" type="text" name="ADR_COMPLEMENTIDENTIFICATION" placeholder="Complément d'adresse" value="<?= $contact['ADR_COMPLEMENTIDENTIFICATION'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "CITY_ID">Ville</label>
            <input id="CITY_ID" type="Integer" name="CITY_ID" placeholder="Saisir l'id de la ville" value="<?= $contact['CITY_ID'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "TAD_ID">type d'adresse</label>
            <input id="TAD_ID" type="text" name="TAD_ID" placeholder="type d'adresse" value="<?= $contact['TAD_ID'];?>">
          </p>
        </td>
      </tr>
      </tr>
        <tr><td><h1><input type ="submit" value="Enregistrer les modifications"/></h1></td></tr>
        </table>
      </form>
  </body>
</html>
