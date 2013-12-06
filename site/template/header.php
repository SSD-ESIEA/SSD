<header>
<img src="resources/ban.jpg" alt="FeedMe"> 
</header>
<section class="loginBox">
<?php
if(isset($_SESSION['login']))
{
    echo  '<p>Vous etes connecté en tant que : '.$_SESSION['login'].'<br><br><a href="logout.php">Se deconecter</a></p>';
}
else
{
    echo '<p><a href="./login.php">Se connecter</a></p>';
}
?>
</section>
