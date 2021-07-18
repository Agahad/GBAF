<?php
session_start()
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="styleGBAF.css"/> 
		<title>GBAF</title>
	</head>
	<body>
		<?php include "header.php" ?>
		<h1>Informations sur votre compte</h1>
		<section id="moncompte">
		
			<form  method="post" action="moncompte.php"><!-- Créer page compte bien crée-->
				<label for="nom"> Nom </br> <input type="text" name="nom" required /></label></br>
				<label for="prenom"> Prénom </br> <input type="text" name="prenom" required /></label></br>
				<label for="login"> Login </br> <input type="text" name="login" required /></label></br>
				<label for="password"> Mot de Passe </br> <input type="password" name="password" required /></label></br>
				<label for="verifpassword"> Vérification Mot de Passe </br> <input type="password" name="verifpassword" placeholder="Resaisissez votre mot de passe" required /></label></br>
				<label for="QS">Choisissez une question secrète </br> </label>
				<select name="QS" id="QS">
					<option value="NJFVM">Nom de jeune fille de votre mère</option>
					<option value="NAC">Nom de votre animal de compagnie</option>
					<option value="POP">Pour vous, c'est quoi la POP culture?</option>
				</select></br>
				<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" required /></label></br>
				<input type="submit" value="Envoyer">
			</form>
		
		</section>
		<?php include "footerGBAF.php" ?>
	</body>
</html>