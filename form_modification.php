<?php

//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V12;charset=utf8','root','');

//preparer la requete modifier DELETE FROM

$pdoStat = $bdd->prepare('SELECT * FROM TE_PERSONNE_PRS WHERE PRS_ID =:num');

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
  <title>Form_modification</title>
  <link ref="stylesheet" href="css/wing.css"/>
  <link ref="stylesheet" href="css/style.css"/>

  </head>
  <body>


    <th><h1>Modifier un contact</h1></th>
      <form action="/API_OBJETDOMO/Flask/templates/modifier" method="POST" >
        <input type="hidden" name="numContact" value="<?$Contact['PRS_ID']?>">
        <table border="1">
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
            <label for "PRS_PRENOM">Prenom</label>
            <input id="PRS_PRENOM" type="text" name="PRS_PRENOM" placeholder="Prénom" value="<?= $contact['PRS_PRENOM'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "TTR_ID">Titre</label>
            <input id="TTR_ID" type="text" name="TTR_ID" placeholder="1 pour monsieur 2 pour madame value" value="<?= $contact['TTR_ID'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "AUTH_ID">Authentification</label>
            <input id="AUTH_ID" type="text" name="AUTH_ID" placeholder="Authentification" value="<?= $contact['AUTH_ID'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_DATENAISSANCE">Date naissance</label>
            <input id="PRS_DATENAISSANCE" type="date" name="PRS_DATENAISSANCE" placeholder="date de naissance" value="<?= $contact['PRS_DATENAISSANCE'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_DEBCONTRAT">debut de contrat</label>
            <input id="PRS_DEBCONTRAT" type="date" name="PRS_DEBCONTRAT" placeholder="debut de contrat" value="<?= $contact['PRS_DEBCONTRAT'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_TEL1">Telephone 1</label>
            <input id="PRS_TEL1" type="tel" name="PRS_TEL1" placeholder="telephone 1" value="<?= $contact['PRS_TEL1'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_TEL2">Telephone 2</label>
            <input id="PRS_TEL2" type="tel" name="PRS_TEL2" placeholder="telephone 2" value="<?= $contact['PRS_TEL2'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_MAIL1">Mail1</label>
            <input id="PRS_MAIL1" type="email" name="PRS_MAIL1" placeholder="mail1" value="<?= $contact['PRS_MAIL1'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_MAIL2">Mail2</label>
            <input id="PRS_MAIL2" type="email" name="PRS_MAIL2" placeholder="mail2" value="<?= $contact['PRS_MAIL2'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_NOTES">Remarques</label>
            <input id="PRS_NOTES" type="notes" name="PRS_NOTES" placeholder="remarques" value="<?= $contact['PRS_NOTES'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "STT_ID">Statut</label>
            <input id="STT_ID" type="notes" name="STT_ID" placeholder="Statut" value="<?= $contact['STT_ID'];?>">
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "AUT_ID">Autonomie</label>
            <input id="AUT_ID" type="notes" name="AUT_ID" placeholder="Autonomie" value="<?= $contact['AUT_ID'];?>">
          </p>
        </td>
      </tr>

        <tr><td><p><input type ="submit" value="Modifier un contact"/></p></td></tr>
        </table>

      </form>
  </body>
</html>
