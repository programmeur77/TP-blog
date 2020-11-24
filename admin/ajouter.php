<?php
session_start();

include('connexionBdd.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Ecrire un article</title>
</head>
<body>
	<div align="center">
		<h1>Ecrire un article sur le blog</h1>

		<p>
			<a href="admin.php">Retour à l'accueil</a>
		</p>

		<?php
		if (isset($_SESSION['message'])) 
		{
			echo $_SESSION['message'];
		}
		?>

		<form method="POST" action="valider_post.php">
			
			<table>
				<tr>
					<td></td>
					<td><input type="text" name="titre" placeholder="Titre" id="titre" size="40" autofocus required /></td>
				</tr>

				<tr>
					<td></td>
					<td><textarea name ="contenu" placeholder="Contenu de l'article" size="400" style="font-family: Verdana" required ></textarea></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" name="valider" value="Publier"></td>
				</tr>
			</table>

		</form>
	</div>
</body>
</html>