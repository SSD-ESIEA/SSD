<?php 

    include_once "template/main.php";
    include_once "includes/DBInterface.php";

    $bdd = new DBInterface();

    if(isset($_SESSION['login'])) //utilisateur connecté
        header('Location: /');  

    elseif(isset($_POST['submit']))
    {
        if(!empty($_POST['email']) 
            && !empty($_POST['email-confirm'])
            && !empty($_POST['pseudo'])
            && !empty($_POST['password'])
            && !empty($_POST['password-confirm'])
            && !empty($_POST['email-confirm'])
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
                            $bdd->addUser($_POST['pseudo'], $_POST['password'], $_POST['email'], !empty($_POST['age']) && is_int($_POST['age']) ? $_POST['age'] : 0 , $_POST['sex'] == 1 || 2 ? $_POST['sex'] : 0, empty($_POST['city']) ? null : $_POST['city']);
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
