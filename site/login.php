<?php
	/**
	 * Formulaire de connexion
	 */

	if(isset($_POST['user']) && isset($_POST['pass'])
	{
		if(isUserValid($_POST['user'], $_POST['pass']))
		{

		}
		else
		{
			?>
			<font color="red"><b>Échec de la connexion</b></font>
			<?php
		}
	}
	else
	{
		generateTemplate('login');
	}
?>