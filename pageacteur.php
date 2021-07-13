<?php
session_start()
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
		<section id="pageacteur">
			<article id="pageacteur_description">
			<!-- Appel BDD Acteur-->
				<p><img src="images/CDE.png" alt"logo CDE"></p>
				<h2>Echo Nom Acteur</h2>
				<p><a href="echo site acteur">echo site acteur</a></p>
				<p>Echo Contenu Textuel</p>
			</article>

			<div id="pageacteur_commentaires">
			<!-- Appel BDD Commentaires-->
				<div id="entete_commentaires">
					<p><strong>'echo id_commentaire' Commentaire(s)</strong></p>
					<div id="entete_commentaires_reactions">
						<form action="pageacteur.php" method="post">
							<textarea name="commentaire" placeholder="Votre commentaire..." rows="4" cols="35"></textarea>
							<p><input type="submit" value="Envoyer"/></p>
						</form>
						<p>XX <a href="ajout 1 like"><img src="images/poucehaut.png" title="j'aime"></a> <a href="ajout 1 like"><img class="poucebas" src="images/poucebas.png" title="je n'aime plus"></a></p>
					</div>
				</div>
				<div id="cartouche_commentaires">
					<!--boucle while-->
					<p>Echo Prenom</p>
					<p>Echo date</p>
					<p> Echo texte commentaire</p>
				</div>
			</div>
		</section>
	</body>
	<?php include "footerGBAF.php"
	?>
</html>