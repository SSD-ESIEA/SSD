<?php 

    include_once "template/main.php";
    include_once "includes/DBInterface.php";

    $bdd = new DBInterface();

    if(isset($_SESSION['login'])) //utilisateur connecté
        header('Location: /');  

    elseif(isset($_POST['submit']))
    {
        if(isset($_POST['email']) 
            && isset($_POST['email-confirm'])
            && isset($_POST['pseudo'])
            && isset($_POST['password'])
            && isset($_POST['password-confirm'])
            && isset($_POST['email-confirm'])
            && isset($_POST['age'])
            && isset($_POST['sex'])
            && isset($_POST['city'])
            ) /* Form submited */
            {
                if(!$bdd->isUserExist($_POST['pseudo']))
                {
                    if($_POST['email'] == $_POST['email-confirm'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !$bdd->isMailAlreadyTaken($_POST['email']))
                    {
                    // mail is valid
                        if($_POST['password'] == $_POST['password-confirm'])
                        {
                             // Everything ok
                            $bdd->addUser($_POST['pseudo'], $_POST['password'], $_POST['email'], $_POST['age'], $_POST['sex'] == 1 || 2 ? $_POST['sex'] : 0, $_POST['city']);
                            generateTemplate('inscriptionSuccess');
                        }
                        else
                            generateTemplate('inscriptionPassIssue');
                    }
                    else
                        generateTemplate('inscriptionEmailIssue');
                }
                else
                    generateTemplate('inscriptionPseudoUsed');
            }
            else
                generateTemplate('inscriptionMissingData');
        }
    else
        generateTemplate("inscription");
?>
