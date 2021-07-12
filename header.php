<!-- Intégration d'un suivi de session-->

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="styleGBAF.css"/> 
		<title>GBAF</title>
	</head>
	<header>
	<!-- Insertion du logo GBAF-->
	<div id="logoGBAF">
		<img src="images/logo GBAF.png" alt="logo GBAF" titre="logo GBAF" width=100>
	</div>
	<div id="cartouche_user"><!--Création du cartouche user-->
		<ul>
			<li><?php
		// Appel de la BDD User
		// insérer image Avatar issu de la base de données user
				?><a href="moncompte.php">Avatar</a> 
			</li><!--Lien vers paramètre user moncompte.php-->
			<li><?php
				echo "Nom Prénom";// insérer Nom et Prénom via echo bdd user
				?>
			</li>
			<li>
				<a href="sedeconnecter.php" title="se déconnecter"><img src="images/sedeconnecter.png" alt="se déconnecter"  width=20></a>
			</li><!--// bouton déconnexion picto off-->	
	</div>
	</header>
</html>