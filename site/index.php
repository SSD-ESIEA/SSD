<?php 

include_once "template/main.php";
include_once "includes/DBInterface.php";

$bdd = new DBInterface();

generateTemplate("search");

?>
