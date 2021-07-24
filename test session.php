<?php
session_start();
//si pas de session, active, on affiche un message d'erreur
echo $_SESSION['Nom'];


if (!isset($_SESSION['Nom'])) 
{
echo "vous devez être connecté";

}
//sinon on affiche la page de connexion
else{
	echo "afficher la page";
}
?>