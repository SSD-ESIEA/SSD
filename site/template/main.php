<?php

session_start();

function generateTemplate($nameCaller = null)
{
    if($nameCaller == null)
        return;

    echo '<!DOCTYPE html><html><head><title>Feedme</title><link rel="stylesheet" type="text/css" href="resources/style.css"></head><body>';
    include('header.php');
    include('nav.php');
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
