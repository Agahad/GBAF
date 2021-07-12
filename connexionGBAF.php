<!-- Intégration d'un suivi de session-->

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="styleGBAF.css"/> 
		<title>GBAF</title>
	</head>
	<?php include "header.php"
	?>

	<div id="page_connexion">
	<body>
		<!-- En-tête du formulaire-->
		<p>	Merci de renseigner votre login et votre mot de passe pour accéder au service GBAF </p>
			
		<!-- Formulaire de connexion-->
		<form action="accueilGBAF.php" method="POST">
			<p><label> Login : <input type="text" name="login"/></label></p>
			<p><label> Mot de passe : <input type="password" name="mdp"/></label></p>
			<p><input type="submit" value="Se connecter"></p>
		</form>
		<div id="lienmdpoubli"><p><a href="mailto:admin@gbaf.com">Mot de passe oublié?</a></p></div><!-- lien vers page question secrète-->
		<p><em>Première connexion ? <a href="inscriptionGBAF.php">Cliquez ici pour créer votre compte</a></em></p>
	</body>

	<?php include "footerGBAF.php"
	?>

</html>