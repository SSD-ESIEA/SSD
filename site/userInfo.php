<?php

	error_reporting(E_ALL);

	include('template/main.php');
	include('includes/DBInterface.php');
	
	if(!isset($_SESSION['login']))	//Seul un user connecté peut voir la fiche des autres
		header('Location: /');

	$bdd = new DBInterface();

	$selfPage = ($_GET['user'] === $_SESSION['login']);

	if($selfPage && (isset($_GET['sex']) || isset($_GET['city']) || isset($_GET['age'])))
	{
		$age = isset($_GET['age']) ? $_GET['age'] : null;
		$sex = isset($_GET['sex']) ? $_GET['sex'] : 0;
		$city = isset($_GET['city']) ? $_GET['city'] : null;

		$bdd->updateUserInfo($_SESSION['login'], $age, $sex, $city);

		generateTemplate('modificationUserSaved');
	}
	else if($selfPage)
	{
		generateTemplate('modificationUserData');
	}
	else
	{
		generateTemplate('displayUserPage');
	}
?>