<nav>
<a href="/index.php">Index</a>

<?php 
   if(!isset($_SESSION['login']))
   {
        echo "<a href=\"/inscription.php\">Inscription</a>";
   }

?>

<a href="/about_txt.php">A propos</a>
</nav>
