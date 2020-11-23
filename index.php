<?php

include('connexionBdd.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Mon super blog !</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<h1>Mon super blog !</h1>

	<p>
		Derniers billets du blog :
	</p>

<?php

$reqBillet = $bdd->query("SELECT id, titre, contenu, DATE_FORMAT(date_creation, 'le %d/%m/%Y à %Hh%imin%ss') AS date FROM billets ORDER BY date_creation DESC LIMIT 0,5");

while ($donnees = $reqBillet->fetch()) 
{
?>

	<h3><?php echo $donnees['titre']; ?> <em> <?php echo $donnees['date']; ?></em></h3>
	<span class="news">
		<p>
			<?php echo $donnees['contenu']; ?><br />
			<?php echo '<em><a href="commentaires.php?id=' . $donnees['id'] . '">Commentaires</a></em>' ?>
		</p>
	</span>
<?php
}
?>
</body>

</html>