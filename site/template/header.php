<header>
<a href="/"><img src="resources/ban.jpg" alt="FeedMe"></a>
</header>
<section class="loginBox">
<?php
if(isset($_SESSION['login']))
{
    echo  '<p>Vous êtes connecté en tant que : '.$_SESSION['login'].'<br><a href="userInfo.php">Vos préférences</a><br><a href="logout.php">Se déconnecter</a></p>';
}
else
{
    echo '<p><a href="./login.php">Se connecter</a></p>';
}
?>
</section>
