<footer>
<p>FOOTER MESSAGE</p>
<p>
<?php

	if(isset($_SESSION['login']))
		echo '<a href="logout.php">Déconnexion</a>';
	else
		echo '<a href="login.php">Connexion</a>';
?>
<a href="administration.php">Adminsitration</a>
</p>


</footer>
