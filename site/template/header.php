<header>
<h1>Feedme</h1>
</header>
<section class="loginBox">
<?php
if(isset($_SESSION['login']))
{
    echo  $_SESSION['login'].' : vous etes connecte<br><a href="logout.php">Se deconnecter</a>';
}
else
{
    echo '<a href="./login.php">Se connecter</a>';
}
?>
</section>
