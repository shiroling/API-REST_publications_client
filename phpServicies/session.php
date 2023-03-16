<?php 
	ob_start();
	session_start();
	if (!isset($_SESSION['id'])) {
		header('Location: ../index.php');
		exit();
	}
	ob_flush();
?>