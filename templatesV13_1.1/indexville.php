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

	<th><h1><strong>Ajouter un nouveau ville :</strong></h1></th>
	<h1>Saisir les informations suivantes :</h1>
    <form action="insertion.php" method="POST" colspan="3" >
      <table class="table" align="left" border="1"/>
			<tr>
				<!--<td><h2><label for "PRS_ID">ID :</label></h2></td>-->
				<td><input id="CITY_ID" type="hidden" name="CITY_ID" placeholder="ID"/><br></td>
			</tr>
				<tr>
	        <td><h2><label for "CITY_CODEPOSTAL">CODEPOSTAL :</label></h2></td>
					<td><input id="CITY_CODEPOSTAL" type="text" name="CITY_CODEPOSTAL" placeholder="CITY_CODEPOSTAL"/><br></td>
	    	</tr>
	    	<tr>
		      <td><h2><label for "CITY_COMMUNE">commune :</label></h2></td>
		      <td><input id="CITY_COMMUNE" type="text" name="CITY_COMMUNE" placeholder="CITY_COMMUNE:"/><br></td>
	    	</tr>
					<div class="bouton">
						<h1><input type ="submit" value="Enregistrer nouvelle ville" witdh="50" height="50"/></h1>
					</div>
				</td>
			</tr>

		</table>
		<table class="table" align="right" border="1">
			</table
    </form>
		<a href="listerville.php">lister les villes</a>

</body>
<footer>

</footer>
</html>
