<?php
	/**
	 * Formulaire de connexion
	 */

	include('template/main.php');
	include('includes/DBInterface.php');
	
	if(isset($_SESSION['login']))
		header('Location: /');

	$bdd = new DBInterface();

	if(isset($_POST['user']) && isset($_POST['pass']))
	{
		if($bdd->isUserValid($_POST['user'], $_POST['pass']))
		{
			$_SESSION['login'] = htmlentities($_POST['user'], ENT_HTML5);
			header('Location: /');
		}
		else
		{
			generateTemplate('loginFailed');
		}
	}
	else
	{
		generateTemplate('login');
	}
?>