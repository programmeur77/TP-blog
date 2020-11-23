<?php
include('connexionBdd.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Accepter billet</title>
</head>
<body>

<?php
$reqBillet = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "le %d/%m%Y à %Hh%imin%ss") AS date FROM billets WHERE id = ?');
$reqBillet->execute(array($_GET['id']));

$donnees = $reqBillet->fetch();

if(!isset($donnees['contenu']))
{
	echo 'Une erreur s\'est produite';
}
?>

<h3><?php echo htmlspecialchars($donnees['titre']); ?> <em> - <?php echo htmlspecialchars($donnees['date']); ?></em></h3>
	<span class="news">
		<p>
			<?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
		</p>
	</span>
		<a href="valider.php?id=<?php echo $donnees['id']; ?>">Valider</a> - <a href="supprimer.php?id=<?php echo$donnees['id']; ?>">Supprimer</a>

</body>
</html>