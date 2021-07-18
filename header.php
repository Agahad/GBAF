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
			<a href="accueilGBAF.php"><img src="images/logo GBAF.png" alt="logo GBAF" titre="logo GBAF"></a>
		</div>
		<div id="cartouche_user"><!--Création du cartouche user-->
			<ul>
				<li><!--Lien vers paramètre user moncompte.php-->
					<div class="avatar"><a href="moncompte.php?user=$_SESSION['id_user']"><img src="images/avatar.png" alt="mon compte" title="Mon Compte"></a></div>
				</li>
				<li><!--insertion Nom et Prénom de la session-->
					<div class="nom_user"><?php echo $_SESSION['Nom'] ." ". $_SESSION['Prenom'] ?></div>
				</li>
				<li>
					<div class="sedeconnecter"><a href="connexionGBAF.php" title="se déconnecter"><img src="images/sedeconnecter.png" alt="se déconnecter"></a></div>
				</li><!--// bouton déconnexion picto off-->	
		</div>
	</header>
</html>