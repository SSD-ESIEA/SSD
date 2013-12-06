<?php

include_once 'config.php';

class DBInterface
{
    private $database;

    function __construct()
    {
        global $CONFIG;
        $dsn = "mysql:host=" . $CONFIG['bdd_hostname'] . "; dbname=" . $CONFIG['bdd_dbname'] . ";";
        $this->database = new PDO($dsn, $CONFIG['bdd_user'], $CONFIG['bdd_password']);
    }

    function isUserValid($username = NULL, $password = NULL)
    {
        $req = $this->database->prepare('SELECT * FROM feedme_users WHERE username = ? AND password = ?');
        $req->execute(array($username, hash('whirlpool', $password)));

        return !($req->fetch() == NULL);
    }

    function isUserExist($username = NULL)
    {
        $req = $this->database->prepare('SELECT * FROM feedme_users WHERE username = ?');
        $req->execute(array($username));

        return !($req->fetch() == NULL);
    }

    function isMailAlreadyTaken($mail = NULL)
    {
        $req = $this->database->prepare('SELECT * FROM feedme_users WHERE mail = ?');
        $req->execute(array($mail));

        return !($req->fetch() == NULL);
    }

    function addUser($username = NULL, $password = NULL, $mail = NULL)
    {
        $req = $this->database->prepare('INSERT INTO feedme_users(username, password, mail) VALUES(:username, :password, :mail)');
        $req->execute(array(
            'username' => $username,
            'password' => hash('whirlpool', $password),
            'mail' => $mail,
        ));

    }

}

?>
