<?php
//ouverture à la base de donnee OBJETDOMO_V12_1_4

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V13_1.1;charset=utf8','root','');

//préparation de la requete d'insertion (SQL)

$pdoStat = $bdd->prepare('INSERT INTO T_E_PERSONNEPHYSIQUE_PRS VALUES (NULL,:PRS_NOM,:PRS_PRENOM,:GEN_ID,:PRS_NOTES,:STT_ID)');

//on lie chaque marqueur à chaque valeur en appelant la methode bindValue

$pdoStat->bindValue(':PRS_NOM', $_POST['PRS_NOM'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_PRENOM', $_POST['PRS_PRENOM'], PDO::PARAM_STR);

$pdoStat->bindValue(':GEN_ID', $_POST['GEN_ID'], PDO::PARAM_STR);

$pdoStat->bindValue(':PRS_NOTES', $_POST['PRS_NOTES'], PDO::PARAM_STR);

$pdoStat->bindValue(':STT_ID', $_POST['STT_ID'], PDO::PARAM_STR);

//var_dump($_POST)
//execution de la requête preparée

$insertIsOk = $pdoStat->execute();

if($insertIsOk){
	$message = 'Le contact a été ajouté dans la base de donnée';
}
else{
	$message = 'Echec de l\insertion';
	}
?>

<!doctype html>

<html lang="fr">

<head>
	<meta charset="UTF-8">
  <meta name ="viewport"
        content ="width-device-width, user-scalable =no, initial-scalable=1.0, maximum-scale = 1.0, minimum-scale=1.0">
  <meta http-equiv ="X-UA-Compatible" content="ie-edge">
  <link ref="stylesheet" href="css/wing.css">

  <title>Insertion des contacts</title>
</head>
  <body>
    <h1>Insertion des contacts</h1>
    <p><h2><?php echo $message; ?></br></h2>
		<h2><a href="lister.php">Lister les contacts</a></h2></p>

  </body>
</html>
