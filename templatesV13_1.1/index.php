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

	<th><h1><strong>Ajouter un nouveau contact :</strong></h1></th>
	<h1>Saisir les informations suivantes :</h1>
    <form action="insertion.php" method="POST" colspan="3" >
      <table class="table" align="left" border="1"/>
			<tr>
				<!--<td><h2><label for "PRS_ID">ID :</label></h2></td>-->
				<td><input id="PRS_ID" type="hidden" name="PRS_ID" placeholder="ID"/><br></td>
			</tr>
				<tr>
	        <td><h2><label for "PRS_NOM">Nom :</label></h2></td>
					<td><input id="PRS_NOM" type="text" name="PRS_NOM" placeholder="Nom"/><br></td>
	    	</tr>
	    	<tr>
		      <td><h2><label for "PRS_PRENOM">Prénom :</label></h2></td>
		      <td><input id="PRS_PRENOM" type="text" name="PRS_PRENOM" placeholder="Prénom :"/><br></td>
	    	</tr>
    		<tr>
					<td><h2><label for "GEN_ID">Saisir 1= Homme ou 2 = Femme:</label></h2></td>
					<td><input id="GEN_ID" type="text" name="GEN_ID" placeholder="Saisir 1= Homme ou 2 = Femme:"/></td>
    		<tr><td><h2><label for "PRS_NOTES">Remarques :</label></h2></td>
						<td><input id="PRS_NOTES" type="text" name="PRS_NOTES" placeholder="remarques"/></td>
    		</tr>
        <tr><td><h2><label for "STT_ID">Saisir 1 = Bénéficiaire,2 = Aidant, 3 = Soignant, 4=Technicien interne, 5=Technicien externe, 6=Cohabitant</label></h2></td>
						<td><input id="STT_ID" type="text" name="STT_ID" placeholder="Statut"/></td>
    		</tr>
					<div class="bouton">
						<h1><input type ="submit" value="Enregistrer nouveau contact" witdh="50" height="50"/></h1>
					</div>
				</td>
			</tr>

		</table>
		<table class="table" align="right" border="1">
			</table
    </form>
		<a href="lister.php">lister les contacts</a>
		<a href="listerville.php">lister les villes</a>
		<a href="listeradresse.php">lister les adresses</a>

</body>
<footer>

</footer>
</html>
