<?php
session_destroy()
?>

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
	</header>	
	<div id="sedeconnecter">
		<body>
			<p><strong>Vous êtes dédonnecté</strong></p>
			<p><a href="connexionGBAF.php">Retour à la page Connexion</a></p>
		</body>
	</div>
	<?php include "footerGBAf.php" ?>
	