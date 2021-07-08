<!-- Intégration d'un suivi de session-->

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="styleGBAF.css"/> 
		<title>GBAF</title>
	</head>


<div id="page_connexion">
<body>
	<div id="headerconnexion">
	<!-- Insertion du logo GBAF-->
		<div id="logoGBAF">
		<p><img src="images/logo GBAF.png" alt="logo GBAF" titre="logo GBAF" width=100> 
		</div>
		Merci de renseigner votre login et votre mot de passe pour accéder au service GBAF </p>
	</div>
		
	<!-- Insertion formulaire de connexio-->
	<form action="accueilGBAF.php" method="POST">
		<p><label> Login : <input type="text" name="login"/></label></p>
		<p><label> Mot de passe : <input type="password" name="mdp"/></label></p>
		<p><input type="submit" value="Se connecter"></p>
	</form>
	<div id="lienmdpoubli"><p><a href="mailto:admin@gbaf.com">Mot de passe oublié?</a></p></div><!--envoi mail automatique avec objet et texte ?-->
</body>