<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="styleGBAF.css"/> 
		<title>GBAF</title>
	</head>
	
	<body>
		<?php include "headervierge.php" ?>
		<h1>Regénération Mot de Passe<h1>
			
		<div id="inscriptionGBAF">
			<p> Merci de renseigner votre login et de répondre à la question secrète afin de renseigner un nouveau mot de passe </p>
			<form  method="post" action="XXXXXXXX.php"><!-- Vérif Login et Question Secrète-->
				<label for="login"> Login </br> <input type="text" name="login" required /></label></br>
				<label for="QS">Votre question secrète </br> </label>
				<select name="QS" id="QS">
					<option value="NJFVM">Nom de jeune fille de votre mère</option>
					<option value="NAC">Nom de votre animal de compagnie</option>
					<option value="POP">Pour vous, c'est quoi la POP culture?</option>
				</select></br>
				<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" required /></label></br>
				<label for="password"> Nouveau Mot de Passe </br> <input type="password" name="password" required /></label></br>
				<label for="verifpassword"> Vérification Mot de Passe </br> <input type="password" name="verifpassword" placeholder="Resaisissez votre mot de passe" required /></label></br>
				<input type="submit" value="Envoyer">
			</form>
		</div>

		<?php include "footerGBAF.php" ?>	
	</body>
	
</html>