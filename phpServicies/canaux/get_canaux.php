<?php
    require_once '../database.php';
    $pdo = getPDOConnection();

    // Requête SQL pour récupérer la liste des canaux
    $sql = "SELECT * FROM Canal";
    $stmt = $pdo->query($sql);

    // Stockage des résultats dans une variable
    $canaux = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Envoi des données sous forme de JSON
    header('Content-Type: application/json');
    echo json_encode($canaux);
?>
