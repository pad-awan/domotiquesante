<?php

//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V12;charset=utf8','root','');

//preparer la requete modifier DELETE FROM

$pdoStat = $bdd->prepare('UPDATE TE_PERSONNE_PRS SET
  PRS_NOM=:PRS_NOM,
  PRS_PRENOM=:PRS_PRENOM,
  TTR_ID=:TTR_ID,
  AUTH_ID=:AUTH_ID,
  PRS_DATENAISSANCE=:PRS_DATENAISSANCE,
  PRS_DEBCONTRAT=:PRS_DEBCONTRAT,
  PRS_TEL1=:PRS_TEL1,
  PRS_TEL2=:PRS_TEL2,
  PRS_MAIL1=:PRS_MAIL1,
  PRS_MAIL2=:PRS_MAIL2,
  PRS_NOTES=:PRS_NOTES,
  STT_ID=:STT_ID,
  AUT_ID=:AUT_ID WHERE PRS_ID=:num LIMIT 1');


//liaison du paramètre nommé
$pdoStat->bindValue(':num', $_POST['numContact'], PDO::PARAM_INT);

$pdoStat->bindValue(':PRS_NOM', $_POST['PRS_NOM'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_PRENOM', $_POST['PRS_PRENOM'], PDO::PARAM_STR);

$pdoStat->bindValue(':TTR_ID', $_POST['TTR_ID'], PDO::PARAM_INT);

$pdoStat->bindValue(':AUTH_ID', $_POST['AUTH_ID'], PDO::PARAM_INT);

$pdoStat->bindValue(':PRS_DATENAISSANCE', $_POST['PRS_DATENAISSANCE'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_DEBCONTRAT', $_POST['PRS_DEBCONTRAT'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_TEL1', $_POST['PRS_TEL1'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_TEL2', $_POST['PRS_TEL2'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_MAIL1', $_POST['PRS_MAIL1'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_MAIL2', $_POST['PRS_MAIL2'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_NOTES', $_POST['PRS_NOTES'], PDO::PARAM_STR);

$pdoStat->bindValue(':STT_ID', $_POST['STT_ID'], PDO::PARAM_INT);

$pdoStat->bindValue(':AUT_ID', $_POST['AUT_ID'], PDO::PARAM_INT);

//executer la requete resultat booleen

$executeIsOk = $pdoStat->execute();

if($executeIsOk){
  $message = 'Le contact a été mis à jour';
}
else{
  $message = 'Echec de la mise à jour du contact';
}
?>

<!doctype html>

<html lang="fr">

<head>
 <meta charset="UTF-8">
  <meta name ="viewport"
        content ="width-device-width, user-scalable =no, initial-scalable=1.0, maximum-scale = 1.0, minimum-scale=1.0">
  <meta http-equiv ="X-UA-Compatible" content="ie-edge"

  <title>Modification : résultat</title>
  <link rel="stylesheet" href="css/wing.css"/>
</head>
  <body>
    <h1>Résultat de la modification</h1>
    <p><?= $message?></p>
    <a href="http://127.0.0.1/API_OBJETDOMO/Flask/templates/lister.php">Retour à la liste des contacts</a>
  </body>
</html>
