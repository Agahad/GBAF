<?php
session_start()
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="styleGBAF.css"/> 
		<title>GBAF</title>
	</head>

<?php include "header.php"
	?>
<div id="accueil">
	
	<body>
		<div id="Section_Presentation">
			<h1>Le Groupement Banque Assurance Français (GBAF)</h1>
			<p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
		les axes de la réglementation financière française. Sa mission est de promouvoir
		l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
		pouvoirs publics.</p>
			<p>Ce site vous permet de mieux connaître et faire mieux connaître les partenaires et acteurs du secteur bancaire. Vous pourrez ici donner votre avis sur les produits et services bancaires et financiers et ainsi accroître vos connaissances et les partager.</p>
			<!--Insertion illustration-->
			<div class="image" style="background-image:url(images/illustrationaccueil.jpeg)"></div>
		</div>
		<div id="Section_Acteurs">
			<h2>Présentation des acteurs</h2>
			<p>Retrouvez ci-dessous la liste des acteurs identifiés par la GBAF. Vous pouvez obtenir davantage d'informations sur chacun d'entre eux et bien entendu partagez vos propres commentaires !</p>
			
			<!--Connexion BDD Mysql-->
			<?php include "accesBDDGBAF.php" ?>
			<?php
			//Récupération table acteur//
			$reponse_acteur = $bdd->query('SELECT * FROM acteur');
			//boucle while pour afficher liste des acteurs
			while($donnees_acteur = $reponse_acteur->fetch())
			{
			?>
			<div id="presentation_acteur">
				<div id="cartouche_acteur">
					<p><img src="images/<?php echo $donnees_acteur['logo']?>" alt"logo CDE"></p>
					<div id="texte_acteur">
						<h3><?php echo $donnees_acteur['acteur']; ?></h3>
						<div id="description_acteur"><p><?php echo $donnees_acteur['description']; ?></p></div>
						<p><a href="www.nomacteur.fr">site web acteur</a></p><!--demander infos sur lien vers site acteur-->
					</div>
					<div id="lire_la_suite">
						<a href="fiche_acteur_xx.php">Lire la suite<a/>
					</div><!--remplacer xx par echo id_acteur-->
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</body>
	
</div>
	<?php include "footerGBAF.php"
	?>
</html>