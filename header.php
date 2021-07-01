<!-- Intégration d'un suivi de session-->

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="style.css"/> 
		<title>GBAF</title>
	</head>
	<header>
	<!-- Insertion du logo GBAF-->
	<img src="images/logo GBAF.png" alt="logo GBAF" titre="logo GBAF" width=100>
	<!--Création du cartouche user-->
		<?php
		// Appel de la BDD User
		// insérer image Avatar issu de la base de données user
		?>Bienvenue :
		<?php
		echo "Nom Prénom";// insérer Nom et Prénom via echo bdd user
		?> <a href="moncompte.php">Mon Compte</a> <!--Lien vers paramètre user moncompte.php-->
		<a href="sedeconnecter.php"><img src="images/sedeconnecter.png" alt="se déconnecter" width=20></a><!--// bouton déconnexion picto off-->	
	</header>
</html>