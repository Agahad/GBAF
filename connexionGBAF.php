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
		<section id="page_connexion">
			
				<!-- En-tête du formulaire-->
				<h1>Connexion</h1>
				<p>	Merci de renseigner votre login et votre mot de passe pour accéder au service GBAF </p>
					
				
				<form action="homepageGBAF.php" method="POST">
					<p><label for="login"> Login : <input type="text" id="login" name="login"/></label></p>
					<p><label for="mdp"> Mot de passe : <input type="password" id="mdp" name="mdp"/></label></p>
					<p><input type="submit" value="Se connecter"></p>
				</form>

				<!-- sinon on charge les données de la BDD-->
					<!-- si login ou mdp erronné, on affcihe un message d'erreur-->
					<!-- sinon on ouvre une session-->

				<div id="lienmdpoubli"><p><a href="mdpoubli.php">Mot de passe oublié?</a></p></div><!-- lien vers page question secrète-->
				<p><em>Première connexion ? <a href="inscriptionGBAF.php">Cliquez ici pour créer votre compte</a></em></p>
			
		</section>
	</body>

</html>