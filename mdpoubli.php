<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="styleGBAF.css"/> 
		<title>GBAF</title>
	</head>
	
	<body>
		<?php include "headervierge.php" ?>
		<h1>Régénération Mot de Passe</h1>
			
		<section class="formulaireGBAF" id="mdpoubli">
			<?php 
			//On charge la base de données//
			include "accesBDDGBAF.php";

			//On vérifie absence de données pour affichier formulaire vierge de départ//
			if(!isset($_POST['login']) AND !isset($_POST['QS']) AND !isset($POST['Reponse_QS']))
			{
			?>
				<p> Merci de renseigner votre login et de répondre à la question secrète afin de régénérer votre nouveau mot de passe </p>
				<form  method="post" action="mdpoubli.php"><!-- Vérif Login et Question Secrète-->
					<label for="login"> Login <br /> <input type="text" id="login" name="login" required /></label><br />
					<label for="QS">Votre question secrète <br /> </label>
					<select name="QS" id="QS">
						<option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
						<option value=">Nom de votre animal de compagnie">Nom de votre animal de compagnie</option>
						<option value="Pour vous, c'est quoi la POP culture?">Pour vous, c'est quoi la POP culture?</option>
					</select><br />
					<label for="Reponse_QS"> Réponse à la question secrète <br /> <input type="text" id="Reponse_QS" name="Reponse_QS" required /></label><br />
					<input type="submit" value="Envoyer">
				</form>
			<?php } 
			//si le login n'existe pas, on affiche un message "Votre login et ou mot de passe sont incorrects"			

			else
			{
				//On prépare les données relatives à la table account avec la possibilité de filter sur le username//
				$req_mdp = $bdd->prepare('SELECT * FROM account WHERE username= :login');
				$req_mdp->execute(array('login' => $_POST['login']));
				$resultat_mdp = $req_mdp->fetch();

			//si un des critères est faux, on affiche message d'erreur//
				if(!$resultat_mdp OR htmlspecialchars($_POST['QS'])!==$resultat_mdp['question'] OR htmlspecialchars($_POST['Reponse_QS'])!==$resultat_mdp['reponse'])//
				{

			?>
					<p> Merci de renseigner votre login et de répondre à la question secrète afin de régénérer votre nouveau mot de passe </p>
					<form  method="post" action="mdpoubli.php"><!-- Vérif Login et Question Secrète-->
						<label for="login2"> Login <br /> <input type="text" id="login2" name="login" required /></label><br />
						<label for="QS2">Votre question secrète <br /> </label>
						<select name="QS" id="QS2">
							<option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
							<option value="Nom de votre animal de compagnie">Nom de votre animal de compagnie</option>
							<option value="Pour vous, c'est quoi la POP culture?">Pour vous, c'est quoi la POP culture?</option>
						</select><br />
						<label for="Reponse_QS2"> Réponse à la question secrète <br /> <input type="text" id="Reponse_QS2" name="Reponse_QS" required /></label><br />
						<input type="submit" value="Envoyer">
					</form>
					<div class="message_erreur"><p>Votre login et/ou votre réponse sont erronnés : merci de vérifier vos informations.</p></div>
				<?php
				}
			//sinon on affiche formulaire mot de passe sous condtions//
				else
				{ 
					
					//si le formulaire est vide, on affiche le formulaire vierge//
					if(!isset($_POST['password']) AND !isset($_POST['verifpassword']))					
					{	
				?>	
					<p>Vous pouvez changer votre mot de passe</p>
					
					<form method="post" action="mdpoubli.php">
						<input type="text" name="login" value=<?php echo htmlspecialchars($_POST['login'])?> hidden />
						<input type="text" name="QS" value="<?php echo htmlspecialchars($_POST['QS'])?>" hidden/>
						<input type="text" name="Reponse_QS" value=<?php echo htmlspecialchars($_POST['Reponse_QS'])?>  hidden/>
						<label for="password"> Nouveau Mot de Passe <br /> <input type="password" id="password" name="password" required /></label><br />
						<label for="verifpassword"> Vérification Mot de Passe <br /> <input type="password" id="verifpassword" name="verifpassword" placeholder="Resaisissez votre mot de passe" required /></label><br />
						<input type="submit" value="Envoyer">
					</form>
					<?php
					}
					//sinonsi le mot de passe est différent du vérif mot de passe, on affiche un message d'erreur//
					elseif ($_POST['password']!==$_POST['verifpassword']) 
					{
					?><p>Vous pouvez changer votre mot de passe</p>

						<form method="post" action="mdpoubli.php">
						<input type="text" name="login" value=<?php echo htmlspecialchars($_POST['login'])?> hidden/>
						<input type="text" name="QS" value="<?php echo htmlspecialchars($_POST['QS'])?>" hidden/>
						<input type="text" name="Reponse_QS" value=<?php echo htmlspecialchars($_POST['Reponse_QS'])?> hidden/>
						<label for="password2"> Nouveau Mot de Passe <br /> <input type="password" id="password2" name="password" required /></label><br />
						<label for="verifpassword2"> Vérification Mot de Passe <br /> <input type="password" id="verifpassword2" name="verifpassword" placeholder="Resaisissez votre mot de passe" required /></label><br />
						<input type="submit" value="Envoyer">
						<div class="message_erreur"><p>Vous avez renseigné deux mots de passe différents, veuillez réessayer svp</p></div>

					<?php
					}
					// Sinon on modifie le mot de passe et on affiche un message de succès//
					else
					{
						$pass_hash=password_hash($_POST['password'], PASSWORD_DEFAULT);
						$req_majmdp = $bdd->prepare('UPDATE account SET password = :nv_password WHERE username = :login_post');
						$req_majmdp->execute(array(
							'nv_password' => $pass_hash,
							'login_post' => $_POST['login']));

						?><p> Votre mot de passe a été modifié avec succès</p>
					<?php	
						header('refresh:3, url=index.php');	
					}
				} 
			}
					?>
		</section>
		

		<?php include "footerGBAF.php" ?>	
	</body>
	
</html>