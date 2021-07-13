<!-- Intégration d'un suivi de session-->

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
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
					?><a href="moncompte.php"><img src="images/avatar.png" alt="mon compte" title="Mon Compte" width=80></a> 
				</li><!--Lien vers paramètre user moncompte.php-->
				<li><?php
					echo "Nom Prénom";// insérer Nom et Prénom via echo bdd user
					?>
				</li>
				<li>
					<a href="connexionGBAF.php" title="se déconnecter"><img src="images/sedeconnecter.png" alt="se déconnecter"  width=20></a>
				</li><!--// bouton déconnexion picto off-->	
		</div>
	</header>
</html>