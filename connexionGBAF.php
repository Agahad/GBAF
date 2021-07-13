<?php
//On vérifie le statut de la session
$statut_session = session_status();
//si une session est active, on la clôture (lien déconnexion)
	if ($statut_session==2) 
	{
		session_destroy();
	}
//sinon on affiche la page de connexion
	else
	{
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="styleGBAF.css"/> 
		<title>GBAF</title>
	</head>
	<?php include "headervierge.php" ?>

	<div id="page_connexion">
		<body>
			<!-- En-tête du formulaire-->
			<p>	Merci de renseigner votre login et votre mot de passe pour accéder au service GBAF </p>
				
			<!-- Formulaire de connexion-->
			<form action="accueilGBAF.php" method="POST">
				<p><label for="login"> Login : <input type="text" name="login"/></label></p>
				<p><label for="mdp"> Mot de passe : <input type="password" name="mdp"/></label></p>
				<p><input type="submit" value="Se connecter"></p>
			</form>
			<div id="lienmdpoubli"><p><a href="mdpoubli.php">Mot de passe oublié?</a></p></div><!-- lien vers page question secrète-->
			<p><em>Première connexion ? <a href="inscriptionGBAF.php">Cliquez ici pour créer votre compte</a></em></p>
		</body>
	</div>
	<?php include "footerGBAF.php"
	?>
	<?php
	}
	?>
</html>