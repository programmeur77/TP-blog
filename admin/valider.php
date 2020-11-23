<?php
include('connexionBdd.php');

$reqValider = $bdd->prepare('UPDATE billets set accepte = 1 WHERE id =?');
$reqValider->execute(array($_GET['id']));

header('Location: admin.php');
?>