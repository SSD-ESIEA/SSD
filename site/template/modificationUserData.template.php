<h2><center>Bonjour <?php echo $_SESSION['login']; ?></center></h2><br><br>

<?php
	include_once('includes/DBInterface.php');
    $bdd = new DBInterface();

    $data = $bdd->getUser($_SESSION['loginRAW']);

	echo 'Votre adresse email est :' . htmlentities($data['mail'], ENT_HTML5) . '<br>';
	echo 'Age: <input type="text" placeholder="Age" ' . ($data['age'] ? 'value='.$data['age'] : '') . ' name="age"><br>';
	echo 'Genre: <select name="sex"><option value="0"' . ($data['genre'] === 0 ? ' selected' . '') . '> - </option><option value="1"' . ($data['genre'] === 1 ? ' selected' . '') . '>Homme</option><option value="2"' . ($data['genre'] === 2 ? ' selected' . '') . '>Femme</option></select><br>';
	echo 'Ville: <input type="text" placeholder="Ville" ' . ($data['age'] ? 'value='.$data['ville'] : '') . ' name="ville"><br>';
?>

