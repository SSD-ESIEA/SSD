<?php

if(!isset($_GET['parent']))
{
    $objects = $bdd->getUserByParent();
}
else
{
    $objects = $bdd->getUserByParent($_GET['parent']);
}

var_dump($objects);

?>
