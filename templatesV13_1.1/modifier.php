<?php

//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V13_1.1;charset=utf8','root','');

//preparer la requete modifier UPDATE SET

$pdoStat = $bdd->prepare('UPDATE TE_PERSONNEPHYSIQUE_PRS SET
  PRS_NOM:PRS_NOM,
  PRS_PRENOM:PRS_PRENOM,
  GEN_ID:GEN_ID,
  PRS_NOTES:PRS_NOTES,
  STT_ID:STT_ID WHERE PRS_ID=:num LIMIT 1');


//liaison du paramètre nommé
$pdoStat->bindValue(':num', $_POST['numContact'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_NOM', $_POST['PRS_NOM'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_PRENOM', $_POST['PRS_PRENOM'], PDO::PARAM_STR);

$pdoStat->bindValue(':GEN_ID', $_POST['GEN_ID'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_NOTES', $_POST['PRS_NOTES'], PDO::PARAM_STR);

$pdoStat->bindValue(':STT_ID', $_POST['STT_ID'], PDO::PARAM_STR);

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
    <img src="img/logoOBJETDOMOTIQUE.jpeg" background-repeat="no-repeat" align="right" valign="middle" alt="logoOBJETDOMOTIQUE">

    <h1>Résultat de la modification</h1>
    <p><?= $message?></p>
    <h1>
    <a href="lister.php">Retour à la liste des contacts</a></h1>
  </body>
</html>
