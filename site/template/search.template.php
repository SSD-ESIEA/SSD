<?php

global $bdd;

if(!isset($_GET['parent']))
{
    $objects = $bdd->getObjectByParent(0);
}
else
{
    $objects = $bdd->getObjectByParent($_GET['parent']);
}

foreach($objects as $object)
{
    if($object['type'] == 'node')
        echo '<p><a href="search.php?parent=' . $object['id']  . '">' . $object['nom'] . '</a></p>';
    else
        echo '<p>' . $object['nom'] . '</p>';
}

?>
