<?php 
	session_start();
	require_once('./php/apiRepository.php');
	//on ouvre la session et on redirige sur l'acceuil si on est déjà connecté
	if(isset($_SESSION['token'])) {
		header("Location: ./php/canal.php");
		exit();
	}

	if (!empty($_POST['identifiant']) && !empty($_POST['password']))
	{
		$USERNAME = $_POST['identifiant'];
		$PASSWORD = $_POST['password'];
		$token = get_token($USERNAME, $PASSWORD);

	    if ($token != null) {
	    	error_log("ca marcha : $token");
			# définition des informations relatives à l’utilisateur
			$_SESSION['token'] = $token;
			header('Location: ./php/canal.php');
			exit();
		} else {
	    	error_log("ca pas marcha !");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./style/style.css" rel="stylesheet">
	<title>Connectez vous !</title>
</head>
<body>
	<main class="center-block">
		<form class="" action="." method="post">
			<fieldset>
				<legend>Connexion</legend>

				<label for="identifiant">Identifiant</label> <br>
				<input type="text" id="identifiant" name="identifiant" required autofocus> <br>

				<label for="mdp">Mot de passe</label> <br>
				<input type="password" id="mdp" name="password" required> <br>

				<input type="submit" value="Valider">
			</fieldset>
		</form>
	</main>
</body>
</html>

<?php
	ob_flush();
?>
