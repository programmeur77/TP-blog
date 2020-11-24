<?php
<<<<<<< HEAD
include('connexionBdd.php');
?>

=======

include('connexionBdd.php');
?>
>>>>>>> index
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

<<<<<<< HEAD
$reqBillet = $bdd->query("SELECT id, titre, contenu, DATE_FORMAT(date_creation, 'le %d/%m/%Y à %Hh%imin%ss') AS date FROM billets WHERE accepte = 1 ORDER BY date_creation DESC LIMIT 0,5");
=======
$reqBillet = $bdd->query("SELECT id, titre, contenu, DATE_FORMAT(date_creation, 'le %d/%m/%Y à %Hh%imin%ss') AS date FROM billets ORDER BY date_creation DESC LIMIT 0,5");
>>>>>>> index

while ($donnees = $reqBillet->fetch()) 
{
?>
<<<<<<< HEAD
	<span class="news">
		<h3>
			<?php echo htmlspecialchars($donnees['titre']); ?> 
			<em> <?php echo $donnees['date']; ?></em>
		</h3>
		<p>
			<?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?><br />
			<em><a href="commentaires.php?id=<?php echo $donnees['id']; ?>">Commentaires</a>
		</p>
	</div>
<?php
}
$reqBillet->closeCursor();
=======

	<h3><?php echo $donnees['titre']; ?> <em> <?php echo $donnees['date']; ?></em></h3>
	<span class="news">
		<p>
			<?php echo $donnees['contenu']; ?><br />
			<?php echo '<em><a href="commentaires.php?id=' . $donnees['id'] . '">Commentaires</a></em>' ?>
		</p>
	</span>
<?php
}
>>>>>>> index
?>
</body>

</html>