<?php
    require_once '../database.php';

    if(!isset($_GET['nom_chat'])) {
        throw new Exception("Error Processing Request", 1);
    }

    $pdo = getPDOConnection();
    $stmt = $pdo->prepare('SELECT DISTINCT m.Contenu as contenu, m.date_message as dateEnvoi, u.nom as sender FROM Message m, Utilisateur u, Canal c WHERE c.Id_canal = m.Id_canal AND m.Id_gens = u.Id_gens AND c.nom_canal = ? ORDER BY date_message DESC LIMIT 10');
    $stmt->execute([$_GET['nom_chat']]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($messages);
?>
