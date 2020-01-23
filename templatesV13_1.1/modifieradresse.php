<?php

//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V13_1.1;charset=utf8','root','');

//preparer la requete modifier UPDATE SET

$pdoStat = $bdd->prepare('UPDATE TE_ADRESSEPOSTALE_ADR SET
  ADR_VOIEPRINCIPALE:ADR_VOIEPRINCIPALE,
  ADR_COMPLEMENTIDENTIFICATION:ADR_COMPLEMENTIDENTIFICATION,
  CITY_ID:CITY_ID,
  TAD_ID:TAD_ID WHERE ADR_ID=:numA LIMIT 1');


//liaison du paramètre nommé
$pdoStat->bindValue(':numA', $_POST['numAdresse'], PDO::PARAM_STR);

$pdoStat->bindValue(':ADR_VOIEPRINCIPALE', $_POST['ADR_VOIEPRINCIPALE'], PDO::PARAM_STR);

$pdoStat->bindValue(':ADR_COMPLEMENTIDENTIFICATION', $_POST['ADR_COMPLEMENTIDENTIFICATION'], PDO::PARAM_STR);

$pdoStat->bindValue(':CITY_ID', $_POST['CITY_ID'], PDO::PARAM_STR);

$pdoStat->bindValue(':TAD_ID', $_POST['TAD_ID'], PDO::PARAM_STR);

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
    <a href="listeradresse.php">Retour à la liste des adresses</a></h1>
  </body>
</html>
