<?php

include('connexionBdd.php');

if (isset($_POST['submit'])) 
{
	if (!empty($_POST['pseudo']) AND !empty($_POST['commentaire'])) 
	{
		$req = $bdd->prepare('INSERT INTO commentaires(auteur, commentaire, date_commentaire) VALUES (?, ?, NOW())');
		$req->execute(array($_POST['pseudo'],
							$_POST['commentaire']));

		header('Location: commentaires.php');
	}
}
?>