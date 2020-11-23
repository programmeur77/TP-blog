<?php
include('connexionBdd.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Mon super Blog - commentaires</title>
</head>

<body>

	<h1>Mon super blog !</h1>

	<p>
		<a href="index.php">Retour à la liste des billets</a>
	</p>

	<?php

	$reqBillet = $bdd->prepare("SELECT titre, contenu, DATE_FORMAT(date_creation, 'le %d/%m/%Y à %Hh%imin%ss') AS date FROM billets WHERE id= ?");
	$reqBillet->execute(array($_GET['id']));

	$donnees = $reqBillet->fetch();
	?>
	<h3><?php echo htmlspecialchars($donnees['titre']); ?> <em> <?php echo htmlspecialchars($donnees['date']); ?></em></h3>
	<span class="news">
		<p>
			<?php echo htmlspecialchars($donnees['contenu']); ?>
		</p>
	</span>

	<h2>Commentaires</h2>

	<div align="center">

		<form method="POST" action="commentaires_post.php?id=<?php echo $_GET['id'];?>">

			<table>
				<tr>
					<td></td>
					<td>
						<input type="text" name="pseudo" placeholder="Votre pseudo" id="pseudo" required />
					</td>
				</tr>

				<tr>
					<td></td>
					<td>
						<textarea name="commentaire" placeholder="Commenter" required></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Envoyer">
					</td>
				</tr>
			</table>

		</form>
	</div>

	<br /><br />

	<?php
	if (isset($_GET['id']) AND !empty($_GET['id'])) 
	{
		$reqCommentaires = $bdd->prepare("SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, 'le %d/%m/%Y à %Hh%imin%ss') AS date FROM commentaires WHERE id_billet= ? ORDER BY date_commentaire");
		$reqCommentaires->execute(array($_GET['id']));

		while ($donnees = $reqCommentaires->fetch()) 
		{
	?>

	<strong><?php echo $donnees['auteur']; ?></strong> <?php echo $donnees['date']; ?><br />
	<p>
		<?php echo $donnees['commentaire']; ?>
	</p>

	<?php
		}
	}
	?>

</body>

</html>