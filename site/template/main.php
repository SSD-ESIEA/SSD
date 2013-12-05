<?php

function generateTemplate($nameCaller = null)
{
    if($nameCaller == null)
        return;

    echo '<!DOCTYPE html><html><body>';

    include('header.php');
    include('footer.php');

    if(file_exists($nameCaller . '.template.php'))
    {
        include($nameCaller . '.template.php');
    }
    else
    {
        include('notFound.php');
    }

    echo '</body></html>';
}
?>
