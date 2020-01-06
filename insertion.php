<?php
//ouverture à la base de donnee OBJETDOMO_V12

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V12;charset=utf8','root','');

//préparation de la requete d'insertion (SQL)

$pdoStat = $bdd->prepare('INSERT INTO TE_PERSONNE_PRS VALUES(:PRS_ID,:PRS_NOM,:PRS_PRENOM,:TTR_ID,:AUTH_ID,:PRS_DATENAISSANCE,:PRS_DEBCONTRAT,:PRS_TEL1,:PRS_TEL2,:PRS_MAIL1,:PRS_MAIL2,:PRS_NOTES,:STT_ID,:AUT_ID)');

//on lie chaque marqueur à chaque valeur en appelant la methode bindValue
$pdoStat->bindValue(':PRS_ID', $_POST['PRS_ID'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_NOM', $_POST['PRS_NOM'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_PRENOM', $_POST['PRS_PRENOM'], PDO::PARAM_STR);

$pdoStat->bindValue(':TTR_ID', $_POST['TTR_ID'], PDO::PARAM_STR);

$pdoStat->bindValue(':AUTH_ID', $_POST['AUTH_ID'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_DATENAISSANCE', $_POST['PRS_DATENAISSANCE'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_DEBCONTRAT', $_POST['PRS_DEBCONTRAT'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_TEL1', $_POST['PRS_TEL1'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_TEL2', $_POST['PRS_TEL2'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_MAIL1', $_POST['PRS_MAIL1'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_MAIL2', $_POST['PRS_MAIL2'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_NOTES', $_POST['PRS_NOTES'], PDO::PARAM_STR);

$pdoStat->bindValue(':STT_ID', $_POST['STT_ID'], PDO::PARAM_STR);

$pdoStat->bindValue(':AUT_ID', $_POST['AUT_ID'], PDO::PARAM_STR);

//execution de la une requête preparée

$insertIsOk = $pdoStat->execute();

if($insertIsOk){$message = 'Le contact a été ajouté dans la base de donnée';}else{$message = 'Echec de l\insertion';}
?>

<!doctype html>

<html lang="fr">

<head>
	<meta charset="UTF-8">
  <meta name ="viewport"
        content ="width-device-width, user-scalable =no, initial-scalable=1.0, maximum-scale = 1.0, minimum-scale=1.0">
  <meta http-equiv ="X-UA-Compatible" content="ie-edge">
  <link ref="stylesheet" href="css/wing.css">

  <title>Document</title>
</head>
  <body>
    <h1>Insertion des contacts</h1>
    <p><?php echo $message; ?></p>
  </body>
</html>
