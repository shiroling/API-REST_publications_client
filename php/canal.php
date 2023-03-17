<?php
    require '../phpServicies/session.php';
    require '../phpServicies/database.php';
?>

<?php
if (isset($_GET['chat'])) {
    $nom_chat = $_GET['chat'];

    // Récupérer les informations sur le chat à partir de la base de données
    $stmt = $pdo->prepare('SELECT Id_canal FROM Canal WHERE nom_canal = ?');
    $stmt->execute([$nom_chat]);
    $id_canal = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$id_canal) {
        // Si le chat n'existe pas dans la base de données, rediriger vers la page d'accueil
        header('Location: ./accueil.php?invalid=true');
        exit();
    }
} else {
    header('Location: ./accueil.php?invalid=true');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../style/canal.css" rel="stylesheet">
    <script src="../js/canal.js"></script>
	<script src="../js/form.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	<title>feurChat: <?php echo "$nom_chat"?></title>
</head>

<body onload='remplirChat(<?php echo json_encode($nom_chat)?>)'>
    <header>
        <div>
            <h2 class="nomChat"><?php echo $nom_chat; ?></h2>
        </div>        
        <a href="../"><img src="" alt="retour maison"></a>
    </header>
    <section>
        <div class='chat-messages' id='messages'>
            <h2>Il n'y a pas de messages dans ce canal</h2>
            <h4>Postez le premiez message et marquez l'histoire du canal <?php echo $nom_chat; ?></h4>
        </div>
    </section>
    <footer>
        <div class="chat-form">
            <form onsubmit='return envoyerMessage(<?php echo json_encode($nom_chat)?>, <?php echo json_encode($_SESSION['id'])?>)'>
                <textarea name="message" placeholder="Saisissez votre message ici"></textarea>
                <input type="submit" name="envoyer" value="Envoyer">
            </form>
        </div>
    </footer>
</body>
    
    <script>
    setInterval(function() {
      remplirChat(<?php echo json_encode($nom_chat)?>);
    }, 15000);
    </script>
</html>