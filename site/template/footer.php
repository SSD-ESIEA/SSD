<footer>
    <p>Ce site a ete realise dans le cadre de la nuit de l'info 2013</p>
    <p>
    <?php

	if(isset($_SESSION['login']))
		echo '<a href="logout.php">Déconnexion</a>';
	else
		echo '<a href="login.php">Connexion</a>';
    ?>
    </p>
</footer>
