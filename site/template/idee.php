<section class="idee">
<?php
require_once '../includes/DBInterface.php';
echo 'Idee du jour :'.getRandomObject()['name'];
?>
</section>
