<?php

include_once 'includes/DBInterface.php';
include_once 'template/main.php';

$bdd = new DBInterface();

generateTemplate('mdpOublie');

if (isset($_POST['email'])){

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		if($bdd->isMailAlreadyTaken($_POST['email']))
		{
			// Envoyé un mail
			echo "Votre nouveau mot de passe vous a été envoyé par email";
		}
		else{

			echo "Ce compte n'existe pas";
		}
	}
	else{
		echo "cette email n'est pas valide";
	}

}



?>
