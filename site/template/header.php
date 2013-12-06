<header>
<h1>Feedme</h1>
</header>
<section class="loginBox">
<?php
        if(isset($_SESSION['login']))
        echo  $_SESSION['login'].' : vous etes connecte';
?>
</section>
