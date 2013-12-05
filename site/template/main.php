<?php

session_start();

function generateTemplate($nameCaller = null)
{
    if($nameCaller == null)
        return;

    echo '<!DOCTYPE html><html><body>';

    include('header.php');
    include('footer.php');

    if(file_exists('template/' . $nameCaller . '.template.php'))
    {
        include('template/' . $nameCaller . '.template.php');
    }
    else
    {
        include('notFound.php');
    }

    echo '</body></html>';
}
?>
