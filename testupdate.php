<?php
include "accesBDDGBAF.php";
$nom='Toto';
$prenom='AAA';
$id=1;
$req=$bdd->prepare('UPDATE account SET nom = :nvnom, prenom = :nvprenom WHERE id_user= :id');
$req->execute(array(
	'nvnom'=>$nom,
	'nvprenom'=>$prenom,
	'id'=>$id));

echo "MAJ OK";
?>