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
  <th><h1>Ajouter un nouveau contact</h1></th>
    <form action="" method="POST" >
      <table border="1">
      <tr>
        <td>
          <p>

          <input id="PRS_ID" type="hidden" name="PRS_ID"
          placeholder="id"/><br>
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p>
            <label for "PRS_NOM">Nom</label>
            <input id="PRS_NOM" type="text" name="PRS_NOM"
            placeholder="Nom"/><br>
          </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "PRS_PRENOM">Prenom</label>
          <input id="PRS_PRENOM" type="text" name="PRS_PRENOM" placeholder="Prenom"/><br>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "TTR_ID">Titre</label>
          <input id="TTR_ID" type="text" name="TTR_ID"
          placeholder="1 pour monsieur 2 pour madame"/>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "AUTH_ID">Authentification</label>
          <input id="AUTH_ID" type="text" name="AUTH_ID"
            placeholder="Authentification"/>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "PRS_DATENAISSANCE">Date naissance</label>
          <input id="PRS_DATENAISSANCE" type="date" name="PRS_DATENAISSANCE" placeholder="date de naissance"/>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "PRS_DEBCONTRAT">debut de contrat</label>
          <input id="PRS_DEBCONTRAT" type="date" name="PRS_DEBCONTRAT" placeholder="debut de contrat"/>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "PRS_TEL1">Telephone 1</label>
          <input id="PRS_TEL1" type="tel" name="PRS_TEL1" placeholder="telephone 1"/>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "PRS_TEL2">Telephone 2</label>
          <input id="PRS_TEL2" type="tel" name="PRS_TEL2" placeholder="telephone 2"/>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "PRS_MAIL1">Mail1</label>
          <input id="PRS_MAIL1" type="email" name="PRS_MAIL1" placeholder="mail1"/>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "PRS_MAIL2">Mail2</label>
          <input id="PRS_MAIL2" type="email" name="PRS_MAIL2" placeholder="mail2"/>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "PRS_NOTES">Remarques</label>
          <input id="PRS_NOTES" type="notes" name="PRS_NOTES" placeholder="remarques"/>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "STT_ID">Statut</label>
          <input id="STT_ID" type="notes" name="STT_ID" placeholder="Statut"/>
					<SELECT name="nom du statut" size="1">
						<OPTION>1- BENEFICIAIRE
						<OPTION>2- SOIGNANT
						<OPTION>3- AIDANT_PRO
						<OPTION>4- AIDANT_FAMILIAL
						<OPTION>5- TECHNICIEN INTERNE
						<OPTION>6- TECHNICIEN EXTERNE
						<OPTION>7- COMPAGNIE
</SELECT>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for "AUT_ID">Autonomie</label>
          <input id="AUT_ID" type="notes" name="AUT_ID" placeholder="Autonomie"/>
        </p>
      </td>
    </tr>

      <tr><td><p><input type ="submit" value="Enregistrer nouveau contact"/></p></td></tr>
      </table>

    </form>
</body>
<footer>

</footer>
</html>
