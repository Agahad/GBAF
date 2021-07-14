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
			
		<section id="inscriptionGBAF">
			<p> Merci de renseigner votre login et de répondre à la question secrète afin de renseigner un nouveau mot de passe </p>
			<?php 
			//On charge la base de données//
			include "accesBDDGBAF.php";

			//On vérifie absence de données pour affichier formulaire vierge de départ//
			if(!isset($_POST['login']) AND !isset($_POST['QS']) AND !isset($POST['Reponse_QS']))
			{
			?>
				<form  method="post" action="mdpoubli.php"><!-- Vérif Login et Question Secrète-->
					<label for="login"> Login </br> <input type="text" name="login" required /></label></br>
					<label for="QS">Votre question secrète </br> </label>
					<select name="QS" id="QS">
						<option value="NJFVM">Nom de jeune fille de votre mère</option>
						<option value="NAC">Nom de votre animal de compagnie</option>
						<option value="POP">Pour vous, c'est quoi la POP culture?</option>
					</select></br>
					<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" required /></label></br>
					<input type="submit" value="Envoyer">
				</form>
			<?php } 
			//si le login n'existe pas, on affiche un message "Votre login et ou mot de passe sont incorrects"
			

			else
			{
				//On prépare les données relatives à la table account avec la possibilité de filter sur le username//
				$login= $_POST['login'];
				$req_mdp = $bdd->prepare('SELECT * FROM account WHERE username= :login');
				$req_mdp->execute(array('login' => $login));
				$resultat_mdp = $req_mdp->fetch();

				?>
					<!--si un des critères est faux, on affiche message d'erreur-->
					<!--sinon on affiche formulaire mot de passe sous condtions :-->
						<!-- si le formulaire est vide, on affiche le formulaire vierge-->
						<!-- sinonsi le mot de passe est différent du vérif mot de passe, on affiche un message d'erreur-->
						<!-- sinon on affiche message de succès et modification mot de passe-->
					<form  method="post" action="mdpoubli.php"><!-- Vérif Login et Question Secrète-->
						<label for="login"> Login </br> <input type="text" name="login" required /></label></br>
						<label for="QS">Votre question secrète </br> </label>
						<select name="QS" id="QS">
							<option value="NJFVM">Nom de jeune fille de votre mère</option>
							<option value="NAC">Nom de votre animal de compagnie</option>
							<option value="POP">Pour vous, c'est quoi la POP culture?</option>
						</select></br>
						<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" required /></label></br>
						<label for="password"> Nouveau Mot de Passe </br> <input type="password" name="password" required /></label></br>
						<label for="verifpassword"> Vérification Mot de Passe </br> <input type="password" name="verifpassword" placeholder="Resaisissez votre mot de passe" required /></label></br>
						<input type="submit" value="Envoyer">
				
					</form>
			<?php } ?>
		<a href="connexionGBAF.php">Retour à la page connexion</a>	
		</section>
		

		<?php include "footerGBAF.php" ?>	
	</body>
	
</html>