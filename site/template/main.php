<?php

session_start();

function generateTemplate($nameCaller = null)
{
    if($nameCaller == null)
        return;

    echo '<!DOCTYPE html><html><head><title>Feedme</title><link rel="stylesheet" type="text/css" href="resources/style.css"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body>';
    include('header.php');
    include('nav.php');
    include('about.php');
    //include('idee.php');
    echo '<section class="main">';    
    if(file_exists('template/' . $nameCaller . '.template.php'))
    {
        include('template/' . $nameCaller . '.template.php');
    }
    else
    {
        include('notFound.php');
    }
    echo '</section>';
    include('footer.php');
    echo '</body></html>';
}
?>
