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
while ($donnees = $reqBillet->fetch()) 
{
?>

	<span class="news">
		<h3>
			<?php echo htmlspecialchars($donnees['titre']); ?> 
			<em> <?php echo $donnees['date']; ?></em>
		</h3>
		<p>
			<?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?><br />
			<em><a href="commentaires.php?id=<?php echo $donnees['id']; ?>">Commentaires</a></em>
		</p>
	</div>
<?php
}
$reqBillet->closeCursor();
?>
</body>

</html>