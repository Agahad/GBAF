<?php
session_start();
//si pas de session, active, on affiche un message d'erreur
if (!isset($_SESSION['Nom'])) 
{
include "headervierge.php";
?><p class="messageerreur">Vous devez être connecté pour accéder à cette page<br />Vous allez être redirigé vers la page d'accueil</p>
<?php header('refresh:3, url=index.php');
}
//sinon on affiche//
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

	<body class="site">
		<?php include "header.php" ?>

		<div id="accueil" class="content">
			
			<section id="Section_Presentation">
				<h1>Le Groupement Banque Assurance Français (GBAF)</h1>
				<p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
			les axes de la réglementation financière française. Sa mission est de promouvoir
			l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
			pouvoirs publics.</p>
				<p>Ce site vous permet de mieux connaître et faire mieux connaître les partenaires et acteurs du secteur bancaire. Vous pourrez ici donner votre avis sur les produits et services bancaires et financiers et ainsi accroître vos connaissances et les partager.</p>
				<!--Insertion illustration-->
				<div class="image" style="background-image:url(images/illustrationaccueil.jpeg)"></div>
			</section>
			<section id="Section_Acteurs">

				<h2>Présentation des acteurs</h2>

				<p>Retrouvez ci-dessous la liste des acteurs identifiés par la GBAF. Vous pouvez obtenir davantage d'informations sur chacun d'entre eux et bien entendu partagez vos propres commentaires !</p>

				<div id="presentation_acteur">
					<!--Connexion BDD Mysql-->
					<?php include "accesBDDGBAF.php" ?>
					<?php
					//Récupération table acteur//
					$reponse_acteur = $bdd->query('SELECT * FROM acteur');
					//boucle while pour afficher liste des acteurs
					while($donnees_acteur = $reponse_acteur->fetch())
					{
					?>
					<article id="cartouche_acteur">
						<!--on charge le logo depuis la base de données en sachant que la valeur 'logo' renvoie le nom du fichier-->
						<p><img src="images/<?php echo $donnees_acteur['logo']?>" alt"logo CDE"></p>
						<div id="texte_acteur">
							<!--chargement du nom de l'acteur-->
							<h3><?php echo $donnees_acteur['acteur']; ?></h3>
							<div id="description_acteur"><p><?php echo $donnees_acteur['description']; ?></p></div>
							<p><a href="www.<?php echo $donnees_acteur['acteur']; ?>.fr">www.<?php echo $donnees_acteur['acteur']; ?>.fr</a></p>
						</div>
						<div id="lire_la_suite">
							<!-- lien vers page fiche_acteur.php avec insertion info $_GET['acteur']=id_acteur-->
							<a href="pageacteur.php?acteur=<?php echo $donnees_acteur['id_acteur']?>">Lire la suite<a/>
						</div>
					</article>

				<div/>
				<?php
				}
				?>
			</section>
		</div>
			<?php include "footerGBAF.php" ?>
	</body>	
<?php } ?>
</html>