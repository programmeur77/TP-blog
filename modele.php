<?php
include('connexionBdd.php');

function getBillets()
{
	global $bdd;

	$reqBillet = $bdd->query("SELECT id, titre, contenu, DATE_FORMAT(date_creation, 'le %d/%m/%Y à %Hh%imin%ss') AS date FROM billets WHERE accepte = 1 ORDER BY date_creation DESC LIMIT 0,5");

	return $reqBillet;
}
?>