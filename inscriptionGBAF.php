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
		<h1>Inscription</h1>
		
		<section class="formulaireGBAF" id="inscriptionGBAF">
		<?php
		//si $_POST['login'] n'existe pas, on charge formulaire vierge//
			if(!isset($_POST['login']))
				{	?>
				<form  method="post" action="inscriptionGBAF.php">
					<label for="nom"> Nom </br> <input type="text" name="nom" required /></label></br>
					<label for="prenom"> Prénom </br> <input type="text" name="prenom" required /></label></br>
					<label for="login"> Login </br> <input type="text" name="login" required /></label></br>
					<label for="password"> Mot de Passe </br> <input type="password" name="password" required /></label></br>
					<label for="verifpassword"> Vérification Mot de Passe </br> <input type="password" name="verifpassword" placeholder="Resaisissez votre mot de passe" required /></label></br>
					<label for="QS">Choisissez une question secrète </br> </label>
					<select name="QS" id="QS">
						<option value="NJFVM">Nom de jeune fille de votre mère</option>
						<option value="NAC">Nom de votre animal de compagnie</option>
						<option value="POP">Pour vous, c'est quoi la POP culture?</option>
					</select></br>
					<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" required /></label></br>
					<input type="submit" value="Envoyer">
				</form>
				<?php
				}
		
			else
				{	//sinon on charge la BDD account et on cherche l'esemble des username = au login saisi/
				include "accesBDDGBAF.php";
				$req=$bdd->prepare('SELECT username from account where username = :login');
				$req->execute(array('login'=>$_POST['login']));
				$rep=$req->fetch();
				//si pas de résultat => le login n'existe pas encore => on affiche message de succès et un lien de redirection vers accueil//
				if($rep)
					{?>
					<p class="messageerreur">Votre login existe déjà, veuillez le changer svp</p>
					<form  method="post" action="inscriptionGBAF.php">
						<label for="nom"> Nom </br> <input type="text" name="nom" value="<?php echo $_POST['nom'] ?>" required /></label></br>
						<label for="prenom"> Prénom </br> <input type="text" name="prenom" value="<?php echo $_POST['prenom'] ?>" required /></label></br>
						<label for="login"> Login </br> <input type="text" name="login" required /></label></br>
						<label for="password"> Mot de Passe </br> <input type="password" name="password" required /></label></br>
						<label for="verifpassword"> Vérification Mot de Passe </br> <input type="password" name="verifpassword" placeholder="Resaisissez votre mot de passe" required /></label></br>
						<label for="QS">Choisissez une question secrète </br> </label>
						<select name="QS" id="QS">
							<option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
							<option value="Nom de votre animal de compagnie">Nom de votre animal de compagnie</option>
							<option value="Pour vous, c'est quoi la POP culture?">Pour vous, c'est quoi la POP culture?</option>
						</select></br>
						<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" required /></label></br>
						<input type="submit" value="Envoyer">
					</form>-->
					<?php	
					}

				//sinonsi le mot de passe est différent du vérif, on affiche un message d'erreur//
				elseif($_POST['password']!==$_POST['verifpassword'])
					{?>
					<p class="messageerreur">Vous avez saisi deux mots de passe différents, merci de vérifier votre saisie</p>
					<form  method="post" action="inscriptionGBAF.php">
						<label for="nom"> Nom </br> <input type="text" name="nom" value="<?php echo $_POST['nom'] ?>" required /></label></br>
						<label for="prenom"> Prénom </br> <input type="text" name="prenom" value="<?php echo $_POST['prenom'] ?>" required /></label></br>
						<label for="login"> Login </br> <input type="text" name="login" required /></label></br>
						<label for="password"> Mot de Passe </br> <input type="password" name="password" required /></label></br>
						<label for="verifpassword"> Vérification Mot de Passe </br> <input type="password" name="verifpassword" placeholder="Resaisissez votre mot de passe" required /></label></br>
						<label for="QS">Choisissez une question secrète </br> </label>
						<select name="QS" id="QS">
							<option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
							<option value="Nom de votre animal de compagnie">Nom de votre animal de compagnie</option>
							<option value="Pour vous, c'est quoi la POP culture?">Pour vous, c'est quoi la POP culture?</option>
						</select></br>
						<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" required /></label></br>
						<input type="submit" value="Envoyer">
					</form>
					<?php	

					}


				//sinon on envoie le formulaire avec message d'erreur pour indiquer de changer de login//
				
				else
					{	echo "on verra ensuite";
						
					
					}
				}
					
		?>
	
		</section>
		<?php include "footerGBAF.php" ?>
	</body>
</html>