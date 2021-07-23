<?php
session_start();
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
		<h1>Paramètres du compte</h1>
		<?php
		//si pas de données $_POST, on charge les données personnelles dans un formulaire//
		if(!isset($_POST['nom']))
			{
			?>
			<section class="formulaireGBAF" id="moncompte">
				<!-- on affiche les données personnelles dans un formulaire. Les champs sont préremplis grâce aux infos de session-->
				<form  method="post" action="moncompte.php">
					<label for="nom"> Nom </br> <input type="text" name="nom" value=<?php echo $_SESSION['Nom'] ?> required /></label></br>
					<label for="prenom"> Prénom </br> <input type="text" name="prenom" value=<?php echo $_SESSION['Prenom'] ?> required /></label></br>
					<label for="login"> Login </br> <input type="text" name="login" value=<?php echo $_SESSION['login'] ?> required /></label></br>
					<label for="password"> Mot de Passe </br> <input type="password" name="password" value=<?php echo $_SESSION['mdp'] ?> required /></label></br>
					<label for="verifpassword"> Vérification Mot de Passe </br> <input type="password" name="verifpassword" value=<?php echo $_SESSION['mdp'] ?> placeholder="Resaisissez votre mot de passe" required /></label></br>
					<label for="QS">Choisissez une question secrète </br> </label>
					<select name="QS" id="QS">
						<option value="<?php echo $_SESSION['question'] ?>" selected><?php echo $_SESSION['question'] ?></option>
						<option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
						<option value="Nom de votre animal de compagnie">Nom de votre animal de compagnie</option>
						<option value="Pour vous, c'est quoi la POP culture?">Pour vous, c'est quoi la POP culture?</option>
					</select></br>
					<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" value=<?php echo $_SESSION['reponse'] ?> required /></label></br>
					<input type="submit" value="Mettre à jour vos données">
				</form>
			</section>
		<?php
			}
		//sinonsi le mot de passe saisi est différent du vérif mot de passe, on affiche un message d'erreur//
		elseif ($_POST['password']!==$_POST['verifpassword'])
			{
				?>
				<section class="formulaireGBAF" id="moncompte">
				<!-- on affiche les données personnelles dans un formulaire. Les champs sont préremplis grâce aux infos de session-->
				<form  method="post" action="moncompte.php">
					<label for="nom"> Nom </br> <input type="text" name="nom" value=<?php echo $_SESSION['Nom'] ?> required /></label></br>
					<label for="prenom"> Prénom </br> <input type="text" name="prenom" value=<?php echo $_SESSION['Prenom'] ?> required /></label></br>
					<label for="login"> Login </br> <input type="text" name="login" value=<?php echo $_SESSION['login'] ?> required /></label></br>
					<label for="password"> Mot de Passe </br> <input type="password" name="password" value=<?php echo $_SESSION['mdp'] ?> required /></label></br>
					<label for="verifpassword"> Vérification Mot de Passe </br> <input type="password" name="verifpassword" value=<?php echo $_SESSION['mdp'] ?> placeholder="Resaisissez votre mot de passe" required /></label></br>
					<label for="QS">Choisissez une question secrète </br> </label>
					<select name="QS" id="QS">
						<option value="<?php echo $_SESSION['question'] ?>" selected><?php echo $_SESSION['question'] ?></option>
						<option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
						<option value="Nom de votre animal de compagnie">Nom de votre animal de compagnie</option>
						<option value="Pour vous, c'est quoi la POP culture?">Pour vous, c'est quoi la POP culture?</option>
					</select></br>
					<label for="Reponse_QS"> Réponse à la question secrète </br> <input type="text" name="Reponse_QS" value=<?php echo $_SESSION['reponse'] ?> required /></label></br>
					<input type="submit" value="Mettre à jour vos données">
				</form>
				<p class="messageerreur">Vous avez saisi deux mots de passe différents, merci de vérifier vos informations</p>
			</section>
			
			<?php
			}
		else//sinon hash le password et on met à jour les données dans la base de données//
			{
			$pass_hash=password_hash($_POST['password'], PASSWORD_DEFAULT);
			include "accesBDDGBAF.php";
			$req_mc=$bdd->prepare('UPDATE account set nom=:nom, prenom=:prenom, username=:username, password=:password, question=:question, reponse=:reponse where id_user=:id');
			$req_mc->execute(array(
				'nom'=>$_POST['nom'],
				'prenom'=>$_POST['prenom'],
				'username'=>$_POST['login'],
				'password'=>$pass_hash,
				'question'=>$_POST['QS'],
				'reponse'=>$_POST['Reponse_QS'],
				'id'=>$_SESSION['id']));
			?>
			<p class="messagesucces">Vos données ont été mises à jour, vous allez être redirigé vers l'accueil</p>
			<?php
			header('refresh:3, url=homepageGBAF.php');
			}
		include "footerGBAF.php" ?>
	</body>
</html>
<?php
}
?>