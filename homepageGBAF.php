<?php

//si une session est active, on la clôture (lien déconnexion)
if (isset($_SESSION['Nom'])) 
{
	$_SESSION=array();
	session_destroy();
}
//sinon on affiche la page
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

	<?php

//si pas de données, on insère le formulaire de connexion + footer//
	if(!isset($_POST['login']) AND !isset($_POST['mdp']))
		{include "connexionGBAF.php";
		 include "footerGBAF.php";
		}
//sinon, on charge les données filtrées sur le user
	else{
		include "accesBDDGBAF.php";
		$req = $bdd->prepare('SELECT * FROM account WHERE username = :login');
		$req->execute(array('login' => $_POST['login']));
		$resultat=$req->fetch();

			//si le user n'existe pas ou si le mdp est incorrect => on affiche formulaire de connexion + message erreur + footer//
			if(!$resultat OR $resultat['password']!==$_POST['mdp'])
			{
				include "connexionGBAF.php";
				?><p class="messagerreur">Votre login et/ou votre mot de passe sont incorrects</p>
				<?php
		 		include "footerGBAF.php";
			}
			//sinon on démarre la session et on insère la page d'accueilGBAF//
			else		
			{
				session_start();
				$_SESSION['Nom'] = $resultat['nom'];
				$_SESSION['Prenom'] = $resultat['prenom'];
				include "accueilGBAF.php";
			}
		}
}	
	?>
	</body>
</html>

