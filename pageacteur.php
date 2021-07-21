<?php
//On démarre la session//
session_start();
//si pas de session => envoi message d'erreur et lien vers accueil//
if (!isset($_SESSION['Nom'])) 
{
include "headervierge.php";
?><p class="messageerreur">Vous devez être connecté pour accéder à cette page</p>
<p><a href="homepageGBAF.php">Retour page d'accueil</a></p>
<?php
}
//sinon on affiche la page//
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

			<article id="pageacteur_commentaires">
			<!-- On sélectionne la table commentaire en fitrant sur l'id acteur-->

				<div id="entete_commentaires">
					<!-- on indique le nombre de commentaires sur la page acteur en cours-->
					<p><strong>'Compteur post where post.id_acteur=$id_acteur' Commentaire(s)</strong></p>
					<div id="entete_commentaires_reactions">
						<!--on insère un bouton permettant l'ajout d'un nouveau commentaire sur la page en cours-->
						<form method="post" action="pageacteur.php?acteur=<?php echo $id_acteur?>" class="bouton">
							<input type="text" value="1" name="addpost" hidden>
							<input type="submit" value ="Ajouter un commentaire">
						</form>
						<!--On ajoute nombre de like/bouton pour ajouter un like/nombre de dislike/bouton pour ajouter un dislike voir cahier pour code-->
						<p>XX <a href="ajout 1 like"><img src="images/poucehaut.png" title="j'aime"></a> <a href="ajout 1 like"><img class="poucebas" src="images/poucebas.png" title="je n'aime plus"></a></p>
					</div>
				</div>
				<div class="newpost">
					<?php
					if(isset($_POST['addpost']))
					{
						?><form method="post" action="pageacteur.php?acteur=$id_acteur">
							<label for="newpost">Votre Commentaire :</label><br />
							<textarea rows="5" cols="80" id="post" name="newpost" required /></textarea><br />
							<input type="submit" value="Partager votre commentaire">
						</form>	
						<?php			
					}
					else
					{
					}
					?>
				</div>

				<div class="cartouche_commentaires">
					
					<!--boucle while-->
					<p>Echo Prenom</p>
					<p>Echo date</p>
					<p> Echo texte commentaire</p>
				</div>
			</article>
		</section>
		<?php include "footerGBAF.php" ?>
		
	</body>
<?php } ?>
</html>