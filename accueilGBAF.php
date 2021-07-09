<!-- Intégration d'un suivi de session-->

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="styleGBAF.css"/> 
		<title>GBAF</title>
	</head>

<div id="accueil">
	<?php include "header.php"
	?>
	<body>
		<div id="Section_Presentation">
			<p><h1>Le Groupement Banque Assurance Français (GBAF)</h1></p>
			<p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
		les axes de la réglementation financière française. Sa mission est de promouvoir
		l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
		pouvoirs publics.</p>
			<p>Ce site vous permet de mieux connaître et faire mieux connaître les partenaires et acteurs du secteur bancaire. Vous pourrez ici donner votre avis sur les produits et services bancaires et financiers et ainsi accroître vos connaissances et les partager.</p>
			<div class="image" style="background-image:url(images/illustrationaccueil.jpeg)"></div>
		</div>
		<div id="Section_Acteurs">
			<p><h2>Présentation des acteurs</h2></p>
			<p>Retrouvez ci-dessous la liste des acteurs identifiés par la GBAF. Vous pouvez obtenir davantage d'informations sur chacun d'entre eux et bien entendu partagez vos propres commentaires!</p>
			<!--Appel BDD acteur-->
			<!--boucle while pour afficher liste des acteurs-->
			<div id="presentation_acteur">
				<p><img src="images/CDE.png" alt"logo CDE"></p>
				<div id="texte_acteur">
					<p><h3>echo acteur</h3></p>
					<p>echo Description</p>
					<p><a href="www.nomacteur.fr">site web acteur</a></p><!--demander infos sur lien vers site acteur-->
				</div>
				<p><div id="lire_la_suite">
					<a href="fiche_acteur_xx.php">Lire la suite<a/>
				</div></p><!--remplacer xx par echo id_acteur-->
			</div>
		</div>

	<?php include "footerGBAF.php"
	?>
</div>
</html>