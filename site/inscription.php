<?php 

    include_once "template/main.php";
    include_once "includes/DBInterface.php";

    $bdd = new DBInterface();

    if(isset($_SESSION['login'])) //utilisateur connecter
    {
        //redirect to index.php
        header('Location: index.php');  
    }
    elseif(isset($_POST['submit']))
    {
        if(isset($_POST['email']) 
            && isset($_POST['email-confirm'])
            && isset($_POST['pseudo'])
            && isset($_POST['password'])
            && isset($_POST['password-confirm'])
            && isset($_POST['email-confirm'])
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
                            $bdd->addUser($_POST['pseudo'], $_POST['password'], $_POST['email']);
                            echo "Utilisateur aouté avec succès !";
                        }
                        else
                        {
                            // Password are not the same
                            echo "Les mots de passes ne correspondent pas !";
                        }
                    }
                    else
                    {
                        //mail invalid or not the same
                        echo "L'adresse mail n'est pas conforme ou la confirmation n'est pas bonne !";
                    }
                }
                else //pseudo already taken
                {
                    echo "Pseudo déjà utilisé !";
                }
            }
            else
            {
                echo "Des infos sont manquantes !";
            }
    }
    else
    {
        generateTemplate("inscription");
    }
?>
