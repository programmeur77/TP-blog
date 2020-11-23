<?php

include('connexionBdd.php');

if (isset($_POST['submit']) AND isset($_GET['id'])) 
{
	if (!empty($_POST['pseudo']) AND !empty($_POST['commentaire'])) 
	{
		$req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');
		$req->execute(array($_GET['id'],
							$_POST['pseudo'],
							$_POST['commentaire']));

		header('Location: commentaires.php?id=' . $_GET['id']);
	}
	else
		echo 'Les champs sont vides.';
}
else
	echo 'Erreur lors du stockage du commentaire';
?>