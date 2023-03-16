<?php
    require_once '../database.php';

	function getIdChatFromName()
	{
		$nom_chat = $_GET['nomChat'];

		$pdo= getPDOConnection();
		$stmt = $pdo->prepare('SELECT Id_canal FROM Canal WHERE nom_canal = ?');
		$stmt->execute([$nom_chat]);
		return $stmt->fetch(PDO::FETCH_ASSOC)['Id_canal'];
	}

	$contenu = $_GET['contenu'];
	$id_utilisateur = $_GET['id'];
	$date = date('Y-m-d H:i:s');

	$pdo= getPDOConnection();
	$stmt = $pdo->prepare('INSERT INTO Message (Contenu, date_message, Id_canal, Id_gens) VALUES (?, ?, ?, ?)');
	$stmt->execute([$contenu, $date, getIdChatFromName(), $id_utilisateur]);




?>
