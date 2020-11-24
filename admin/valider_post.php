<?php
session_start();

include('connexionBdd.php');

if (isset($_POST['valider'])) 
{
	//if (!empty($_POST['titre']) AND !empty($POST['contenu'])) 
	//{
		$reqAjouter = $bdd->prepare('INSERT INTO billets(titre, contenu, date_creation) VALUES(?, ?, NOW())');
		$reqAjouter->execute(array($_POST['titre'], $_POST['contenu']));

		if ($reqAjouter) 
		{
			$_SESSION['publie'] = "Votre billet a bien été publié";
			header('Location: ajouter.php');
		}
		else
		{
			$_SESSION['publie'] = "Erreur lors du stockage dans la base de données";
			header('Location: ajouter.php');
		}
	//}
	//else
	//{
	//	$_SESSION['publie'] = "Tous les champs doivent être remplis";
	//	header('Location: ajouter.php');
	//}
}
?>