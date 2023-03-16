<?php
    require_once '../phpServicies/session.php';
    require_once '../phpServicies/database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../style/accueil.css" rel="stylesheet">
	<script src="../js/canal.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <title>Page d'accueil</title>
</head>
<body onload='remplirListeCanaux()'>
	<main class="center-block">
		<h1>Liste des canaux</h1>
		<div class='canaux', id='listeCanaux'>
		</div>
	</main>
</body>
</html>
