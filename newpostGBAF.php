<?php
session_start();
if (!isset($_SESSION['Nom'])) 
{
include "headervierge.php";
?><p class="messageerreur">Vous devez être connecté pour accéder à cette page</p>
<p><a href="homepageGBAF.php">Retour page d'accueil</a></p>
<?php
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

	
	<body>
		<?php include "header.php" ?>	
		<section class="formulaireGBAF" id="newpostGBAF">
			<h1>Ajouter ici votre commentaire sur xxx</h1>
			<form method="post" action="pageacteur?acteur=htmlspecialchars($_GET['acteur']).php">
				<label for="post">Votre Commentaire :</label><br />
				<textarea rows="5" cols="50" id="post" name="post" required /></textarea><br />
				<input type="submit" value="Partager votre commentaire">
			</form>
		</section>
		<?php include "footerGBAF.php" ?>
	</body>
</html>
<?php
}
?>