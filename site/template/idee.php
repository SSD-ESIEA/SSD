<section class="idee">
<?php
include_once 'DBInterface.php';
echo 'Idee du jour :'.getRandomObject()['name'];
?>
</section>
