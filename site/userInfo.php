<?php
include_once "template/main.php";
include_once "includes/DBInterface.php";
$bdd = new DBInterface();
if(!isset($_SESSION['login'])) //utilisateur connecté
{
	//redirect to root
	header('Location: /');
}
if (isset($_GET['user_login']) && ($bdd->isUserExist($_GET['user_login'])) ){
	echo "Profil de " . $_GET['user_login'] . " <img style=\"float:right;\" src=\"images/" . $_GET['user_login'] .".png\" > <br>";
}


?>
