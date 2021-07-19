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
				{	//sinon on charge la BDD account et on affiche l'esemble des username/
				include "accesBDDGBAF.php";
				$req=$bdd->query('SELECT username from account');
				$rep=$req->fetch();
				//si login existe déjà => on affiche message d'erreur//
				if($rep==$_POST['login'])
					{?>
					<p class="messageerreur">Votre login existe déjà, veuillez le changer svp</p>
					<form  method="post" action="inscriptionGBAF.php">
						<label for="nom"> Nom </br> <input type="text" name="nom" value="$_POST['nom']" required /></label></br>
						<label for="prenom"> Prénom </br> <input type="text" name="prenom" value="$_POST['prenom']" required /></label></br>
						<label for="login"> Login </br> <input type="text" name="login" required /></label></br>
						<label for="password"> Mot de Passe </br> <input type="password" name="password" required /></label></br>
						<label for="verifpassword"> Vérification Mot de Passe </br> <input type="password" name="verifpassword" placeholder="Resaisissez votre mot de passe" required /></label></br>
						<label for="QS">Choisissez une question secrète </br> </label>
						<select name="QS" id="QS">
							<option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
							<option value="Nom de votre animal de compagnie">Nom de votre animal de compagnie</option>
							<option value="Pour vous, c'est quoi la POP culture?">Pour vous, c'est quoi la POP culture?</option>
						</select></br>
						<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" value="$_POST['Reponse_QS']" required /></label></br>
						<input type="submit" value="Envoyer">
					</form>

					<?php
					}
				//sinon on met enregistre les données et on affiche un message de succès et un lien de redirection vers accueil//
				else
					{echo "on verra ensuite";
					}
				}
					
		?>
	
		</section>
		<?php include "footerGBAF.php" ?>
	</body>
</html>