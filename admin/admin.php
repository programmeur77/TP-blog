<?php
session_start();
include('connexionBdd.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Accueil Admin</title>
</head>
<body>

	<h1><center>Bienvenue sur l'espace d'Administration du blog</center></h1>

<?php
$reqBillet = $bdd->query('SELECT id, titre, DATE_FORMAT(date_creation, "le %d/%m/%Y à %Hh%imin%ss") AS date FROM billets WHERE accepte = 0 ORDER BY date_creation DESC');
while($donnees = $reqBillet->fetch())
{
?>
	<h3><?php echo $donnees['titre']; ?> - <?php echo $donnees['date']; ?></h3>

	<a href="accepterbillet.php?id=<?php echo $donnees['id']; ?>">Lire en entier</a>

<?php
}
?>

</body>
</html>