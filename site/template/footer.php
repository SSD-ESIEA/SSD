<footer>
    <p>Ce site a ete realise dans le cadre de la nuit de l'info 2013 par la team SSD</p>
    <p>
    <img src="resources/esiea.jpg" alt="esiea"> <img src="resources/iti.jpg"> <img src="resources/nuit_info.jpg">    
</p>
<p>Licence CC-BY</p>
    <p>
    <?php

	if(isset($_SESSION['login']))
		echo '<a href="logout.php">Déconnexion</a>';
	else
		echo '<a href="login.php">Connexion</a>';
    ?>
    </p>
</footer>
