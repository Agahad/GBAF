<?php
//On démarre la session//
session_start();
//si pas de session => envoi message d'erreur et lien vers accueil//
if (!isset($_SESSION['Nom'])) 
{
include "headervierge.php";
?><p class="messageerreur">Vous devez être connecté pour accéder à cette page<br />Vous allez être redirigé vers la page d'accueil</p>
<?php header('refresh:3, url=index.php');
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
		<?php 
		//Appel de la base de données GBAF//
		include "accesBDDGBAF.php";
		//récupération de l'id de l'acteur dans l'URL dans une variable//
		$id_acteur=htmlspecialchars($_GET['acteur']);
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
				<!-- on commence par vérifier si un nouveau commentaire a été envoyé-->
				<?php 
				if(isset($_POST['newpost']))
					{//si oui, on insère le nouveau commentaire dans la base//
					$req_addpost=$bdd->prepare('INSERT INTO post (id_user, id_acteur, date_add, post) value(:id_user, :id_acteur, :date_add, :post)');
					$req_addpost->execute(array(
						'id_user'=>$_SESSION['id'],
						'id_acteur'=>$id_acteur,
						'date_add'=>date("Y-m-d"),
						'post'=>$_POST['newpost']));
					//$nb_post_echo $id_acteur=$nb_post_echo $id_acteur+1 à tester//
					header('location: pageacteur.php?acteur='.$id_acteur);
					exit();
					}
					//sinon on ne fait rien//
				else{}
				?>


				<!-- On sélectionne la table commentaire en fitrant sur l'id acteur-->

				<div id="entete_commentaires">
					<!--COMPTEUR COMMENTAIRES-->
					<?php
					//on sélectionne la table post en filtrant sur l'id acteur//
					$req_post=$bdd->prepare('SELECT * from post where id_acteur=:id_acteur');
					$req_post->execute(array('id_acteur'=>$id_acteur));
					//on envoie les réponses correspondantes dans une variable//;
					$rep_post=$req_post->fetch();
					//si il n'y a pas de correspondance, c'est que le compteur doit être à 0//
					if(!$rep_post)
						{$compteur_post=0;}
					//sinon on compte le nombre de commentaires que l'on envoie dans une variable//
					else
					{
						$req_compteurpost=$bdd->prepare('SELECT id_post FROM post where id_acteur=:id_acteur');
						$req_compteurpost->execute(array('id_acteur'=>$id_acteur));
						$compteur_post=0;	
						while($rep_compteurpost=$req_compteurpost->fetch()){
						$compteur_post=$compteur_post+1;
						}
					}
					?>
					<!-- on écit le nombre de commentaire(s) pour cet acteur en utilisant la variable $rep_compteurpost qui renvoie 0 si aucun comm sur cet acteur-->
					<p><strong><?php echo $compteur_post ?> Commentaire(s)</strong></p>
					<div id="entete_commentaires_reactions">
						<!--BOUTON NOUVEAU COMMENTAIRE-->
						<form method="post" action="pageacteur.php?acteur=<?php echo $id_acteur?>" >
							<input type="text" value="1" name="addpost" hidden>
							<input class="bouton" type="submit" value ="Ajouter un commentaire">
						</form>
						<!--PARTIE LIKE/DISLIKE-->
						<!--On ajoute nombre de like/bouton pour ajouter un like/nombre de dislike/bouton pour ajouter un dislike-->
						<!-- AJOUT ou MAJ d'un LIKE/DISLIKE-->
						<?php //on commence par sélectionner la table vote en filtrant sur id_acteur et id_user//
							$req_vote=$bdd->prepare('SELECT vote from vote where id_user=:id_user AND id_acteur=:id_acteur');
							$req_vote->execute(array(
								'id_user'=>$_SESSION['id'],
								'id_acteur'=>$id_acteur));
							$rep_vote=$req_vote->fetch();
							//on va ensuite vérifier l'existence de $_POST['like'] et de $rep_vote//
							//si $rep_vote n'existe pas et que $_POST existe => on insère le (dis)like dans la table//
							
							if(!$rep_vote AND isset($_POST['like']))
								{
									$req_vote_ins=$bdd->prepare('INSERT INTO vote (vote, id_user, id_acteur) values (:vote, :id_user, :id_acteur)');
									$req_vote_ins->execute(array(
										'vote'=>$_POST['like'],
										'id_user'=>$_SESSION['id'],
										'id_acteur'=>$id_acteur));
								}
							//sinon on ne fait rien => on ne peut pas changer son vote//
							else{}
						?>
						<!--Comteur de like/dislike-->
							<?php
							//on définit les compteurs like et dislike à 0//
							$compteur_like=0;
							$compteur_dislike=0;
							//on détetrmine le nombre like avec une requête et une boucle//
							$req_like_count=$bdd->prepare("SELECT vote from vote where vote='like' AND id_acteur=:id_acteur");
							$req_like_count->execute(array('id_acteur'=>$id_acteur));
							while($req_like_count->fetch())
								{$compteur_like=$compteur_like+1;}

							//on détetrmine le nombre like avec une requête et une boucle//
							$req_dislike_count=$bdd->prepare("SELECT vote from vote where vote='dislike' AND id_acteur=:id_acteur");
							$req_dislike_count->execute(array('id_acteur'=>$id_acteur));
							while($req_dislike_count->fetch())
								{$compteur_dislike=$compteur_dislike+1;}
							
							?>
						<div id="like_dislike">
							<!--on affiche le nombre de like puis le bouton ajout like (puis idem pour dislike)-->
							<p><?php echo $compteur_like ?></p>
							<!-- on insère un bouton like qui enverra un post = like à la page-->
							<form method="post" action="pageacteur.php?acteur=<?php echo $id_acteur?>">
								<input type="text" name="like" value="like" hidden>
								<input id="like" class="pouce" type="submit" value=""/>
							</form>
							<p><?php echo $compteur_dislike ?></p>
							<form method="post" action="pageacteur.php?acteur=<?php echo $id_acteur?>">
								<input type="text" name="like" value="dislike" hidden>
								<input id="dislike" class="pouce" type="submit" value=""/>
							</form>
						</div>
					</div>
				</div>
				<div class="newpost">
					<?php
					//on charge les données relatives aux posts pour l'user et l'acteur en cours//
					$req_post_user=$bdd->prepare('SELECT post from post where id_user=:id_user AND id_acteur=:id_acteur');
					$req_post_user->execute(array('id_user'=>$_SESSION['id'], 'id_acteur'=>$id_acteur));
					$rep_post_user=$req_post_user->fetch();
					//on vérifie si une demande de nouveau commentaire a été envoyée et si l'user n'a pas déjà posté de commentaire//
					if(isset($_POST['addpost']) and !$rep_post_user)
					{//si oui, on insère un formulaire pour poster un nouveau commentaire//
						?><form method="post" action="pageacteur.php?acteur=<?php echo $id_acteur?>">
							<label for="newpost">Votre Commentaire :</label><br />
							<textarea rows="5" cols="80" id="post" name="newpost" required /></textarea><br />
							<input type="submit" value="Partager votre commentaire">
						</form>	
						<?php			
					}
					//si l'user a déjà posté un commentaire, on lui signale qu'il ne peut pas en poster un second//
					elseif (isset($_POST['addpost']) and $rep_post_user) {
						?><p class="messageerreur">Vous avez déjà partagé un commentaire pour cet acteur</p>
					<?php
					}
					else
					{//sinon rien//
					}
					?>
				</div>
					<?php //on sélectionne les données des tables post (le post et la date) et account (prénom) en filtrant sur l'acteur en question et sur l'id_user (correspondance entre le user et le post)//
					$req_post2=$bdd->prepare('SELECT post.post AS pp, date_format (post.date_add, "%d/%m/%Y") AS pda, account.prenom AS ap FROM post, account where post.id_user=account.id_user AND post.id_acteur=:id_acteur ORDER BY post.id_post DESC');
					$req_post2->execute(array('id_acteur'=>$id_acteur));
					while($rep_post2=$req_post2->fetch())
					{ 
						//on insère les commentaires avec les réponses envoyées dans l'array de la variable $rep_post en faisant des jonctions entre tables//
						?>
						<div class="cartouche_commentaires">
						<p><?php echo $rep_post2['ap'] ." le ". $rep_post2['pda']?></p>
						<p><em>"<?php Echo $rep_post2['pp']?>"</em></p>
						</div>
						<?php
					}
					?>		
			</article>
		</section>
		<?php include "footerGBAF.php" ?>
		
	</body>
<?php } ?>
</html>