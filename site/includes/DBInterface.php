<?php

include_once "config.php";

class DBInterface
{
        private $database;

        function __construct()
        {
            $database = new PDO('mysql:host=' . $CONFIG['bdd_hostname'] . ';dbname='. $CONFIG['bdd_dbname'], $CONFIG['bdd_user'], $CONFIG['bdd_password']);
        }

        function isUserValid($username = NULL, $password = NULL)
        {
            $req = $database->prepare('SELECT * FROM feedme_users WHERE username = ? AND password = ?');
            $req->execute(array($username, hash('whirlpool', $password)));

            return !($req->fetch() == NULL);
        }
}

?>
