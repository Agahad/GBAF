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
		<section id="pageacteur">
		<?php //Appel de la base de données GBAF//
		include "accesBDDGBAF.php";
		//récupération de l'id de l'acteur dans l'URL dans une variable//
		$id_acteur=$_GET['acteur'];
		?>
			<article id="pageacteur_description">
			<?php 
			//On sélectionne les données dans la table acteur en sélectionnant sur la variable id_acteur//
			$req_acteur=$bdd->prepare('SELECT * FROM acteur where id_acteur = :id_acteur');
			$req_acteur->execute(array('id_acteur'=>$id_acteur));
			$reponse_acteur=$req_acteur->fetch();

			?>
				<!--On affiche les informations demandées sur l'acteur dans la page-->
				<h1><img src="images/<?php echo $reponse_acteur['logo']?>" alt"logo <?php echo $reponse_acteur['acteur'] ?>"></h1>
				<h2><?php echo $reponse_acteur['acteur'] ?></h2>
				<p><a href="www.<?php echo $reponse_acteur['acteur'] ?>.fr">www.<?php echo $reponse_acteur['acteur'] ?>.fr</a></p>
				<p><?php echo $reponse_acteur['description'] ?></p>
			</article>

			<div id="pageacteur_commentaires">
			<!-- On sélectionne la table commentaire en fitrant sur l'id acteur-->

				<div id="entete_commentaires">
					<p><strong>'Compteur post where post.id_acteur=$id_acteur' Commentaire(s)</strong></p>
					<div id="entete_commentaires_reactions">
						<p class="bouton"><a href="newpostGBAF.php?acteur=<?php echo $id_acteur ?>">Ajouter un commentaire</a></p>
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
		<?php include "footerGBAF.php" ?>
		
	</body>
<?php } ?>
</html>