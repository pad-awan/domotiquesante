<?php
//ouverture à la base de donnee OBJETDOMO_V12_1_4

$bdd = new PDO('mysql:host=127.0.0.1;dbname=OBJETDOMO_V13_1.1;charset=utf8','root','');

//préparation de la requete d'insertion (SQL)

$pdoStat = $bdd->prepare('INSERT INTO TE_ADRESSEPOSTALE_ADR VALUES (NULL,:ADR_VOIEPRINCIPALE ,:ADR_COMPLEMENTIDENTIFICATION,:CITY_ID,:TAD_ID)');

//on lie chaque marqueur à chaque valeur en appelant la methode bindValue

$pdoStat->bindValue(':ADR_VOIEPRINCIPALE', $_POST['ADR_VOIEPRINCIPALE'], PDO::PARAM_STR);

$pdoStat->bindValue(':ADR_COMPLEMENTIDENTIFICATION', $_POST['ADR_COMPLEMENTIDENTIFICATION'], PDO::PARAM_STR);

$pdoStat->bindValue(':CITY_ID', $_POST['CITY_ID'], PDO::PARAM_STR);

$pdoStat->bindValue(':TAD_ID', $_POST['TAD_ID'], PDO::PARAM_STR);

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

  <title>Insertion de l'adresse</title>
</head>
  <body>
    <h1>Insertion de l'adresse</h1>
    <p><h2><?php echo $message; ?></br></h2>
		<h2><a href="listeradresse.php">Lister les adresses</a></h2></p>

  </body>
</html>
