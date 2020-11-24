<?php
include('connexionBdd.php');

if (isset($_GET['id'])) 
{
	if (!empty($_GET['id'])) 
	{
		$reqDelete = $bdd->prepare('DELETE FROM billets WHERE id= ?');
		$reqDelete->execute(array($_GET['id']));

		header('Location: admin.php');

		$reqDelete->close_cursor();
	}
	else
		echo "Erreur : ID vide";
}
else 
	echo "Erreur";
?>