<?php
    require './session.php';
    require './apiRepository.php';
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

	<title>Cannal des publications</title>
</head>

<body onload="alert('pouet pouet, should load here')">
    <header>
        <div>
            <h2 class="nomChat">Publications</h2>
        </div>        
    </header>
    <section>
        <div class='chat-messages' id='messages'>
            <h2>Il n'y a pas de post dans ce canal</h2>
        </div>
    </section>
    <?php
    $token =$_SESSION['token'];
    if (get_role($token) == "publisher") {
        echo "
        <footer>
            <div class='chat-form'>
                <form onsubmit='return publier($token)'>
                    <textarea name='message' placeholder='Saisissez votre message ici'></textarea>
                    <input type='submit' name='envoyer' value='Envoyer'>
                </form>
            </div>
        </footer>";
    }
    ?>
</body>
    <script>
    setInterval(function() {
      remplirChat(<?php echo json_encode($nom_chat)?>);
    }, 15000);
    </script>
</html>