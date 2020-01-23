<!doctype html>

<html lang="fr">

<head>
	<meta charset="UTF-8">
  <meta name ="viewport"
        content ="width-device-width, user-scalable =no, initial-scalable=1.0, maximum-scale = 1.0, minimum-scale=1.0">
  <meta http-equiv ="X-UA-Compatible" content="ie-edge">
  <link ref="stylesheet" href="css/wing.css">
</head>

	<body>
	<img src="img/logoOBJETDOMOTIQUE.jpeg" background-repeat="no-repeat" align="right" valign="bottom" alt="logoOBJETDOMOTIQUE">

	<th><h1><strong>Ajouter une nouvelle adresse :</strong></h1></th>
	<h1>Saisir les informations suivantes :</h1>
    <form action="insertionadresse.php" method="POST" colspan="3" >
      <table class="table" align="left" border="1"/>
			<tr>
				<!--<td><h2><label for "PRS_ID">ID :</label></h2></td>-->
				<td><input id="ADR_ID" type="hidden" name="ADR_ID" placeholder="ID"/><br></td>
			</tr>
				<tr>
	        <td><h2><label for "ADR_VOIEPRINCIPALE">Voie principale</label></h2></td>
					<td><input id="ADR_VOIEPRINCIPALE" type="text" name="ADR_VOIEPRINCIPALE" placeholder="Num, Rue/ avenue/ boulevard.."/><br></td>
	    	</tr>
	    	<tr>
		      <td><h2><label for "ADR_COMPLEMENTIDENTIFICATION">Complément d'adresse</label></h2></td>
		      <td><input id="ADR_COMPLEMENTIDENTIFICATION" type="text" name="ADR_COMPLEMENTIDENTIFICATION" placeholder="Batiment,appart :"/><br></td>
	    	</tr>
    		<tr>
					<td><h2><label for "CITY_ID">Ville</label></h2></td>
					<td><input id="CITY_ID" type="text" name="CITY_ID" placeholder="ID DE LA VILLE"/></td>
					<tr>
						<td><h2><label for "TAD_ID"> adresse principale, secondaire ou visiteur</label></h2></td>
						<td><input id="TAD_ID" type="text" name="TAD_ID" placeholder="Saisir au choix 1 = principale, 2 = secondaire,3 = visiteur"/></td>
					<div class="bouton">
						<h1><input type ="submit" value="Enregistrer nouvelle adresse" witdh="50" height="50"/></h1>
					</div>
				</td>
			</tr>

		</table>
		<table class="table" align="right" border="1">
			</table
    </form>
		<a href="listeradresse.php">lister les adresses</a>
		<a href="lister.php">lister les contacts</a>

</body>
<footer>

</footer>
</html>
