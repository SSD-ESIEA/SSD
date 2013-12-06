<?php

include_once "includes/DBInterface.php";
$bdd = new DBInterface();

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
