<?php 
	session_start();
	//on ouvre la session et on redirige sur l'acceuil si on est déja co
	if(isset($_SESSION['id'])) {
		header("Location: ./php/accueil.php");
		exit();
	}

	require_once './phpServicies/database.php';

	function get_utilisateur($username, $password) {
		$pdo = getPDOConnection();
		$stmt = $pdo->prepare("SELECT Id_gens FROM Utilisateur WHERE nom = ? AND phrase_2_securite = ?");
	    $stmt->execute([$username, $password]);
	    return $stmt->fetch(PDO::FETCH_ASSOC);
	}


	if (!empty($_POST['username']) && !empty($_POST['password']))
	{
		$USERNAME = $_POST['username'];
		$PASSWORD = $_POST['password'];
		$id_gen = get_utilisateur($USERNAME, $PASSWORD);

	    if ($id_gen) {
			# définition des informations relatives à l’utilisateur
			$_SESSION['id'] = $id_gen['Id_gens'];
			header('Location: ./php/accueil.php');
			exit();
		} else {
			echo "<script>alert('Identifiant ou mot de passe incorrect');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./css/login.css" rel="stylesheet">
	<title>Connectez vous !</title>
</head>
<body>
	<main class="center-block">
		<form class="" action="." method="post">
			<fieldset>
				<legend>Connection</legend>

				<label for="mail">Nom d’utilisateur</label> <br>
				<input type="text" id="mail" name="username" required autofocus> <br>

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