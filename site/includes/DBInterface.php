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

    function addUser($username = NULL, $password = NULL, $mail = NULL, $age = NULL, $sex = 0, $city = NULL)
    {
        $req = $this->database->prepare('INSERT INTO feedme_users(username, password, mail, genre, ville, age) VALUES(:username, :password, :mail, :genre, :ville, :age)');
        $req->execute(array(
            'username' => $username,
            'password' => hash('whirlpool', $password),
            'mail' => $mail,
            'genre' => $age,
            'ville' => $sex,
            'age' => $city,
        ));

    }

    function updateUserInfo($username = NULL, $age = NULL, $sex = 0, $city = NULL)
    {
        $req = $this->database->prepare('UPDATE feedme_users SET age = :age, ville = :ville, genre = :sex WHERE username = :username');
        $req->execute(array(
            'username' => $username,
            'age' => $age,
            'ville' => $ville,
            'genre' => $sex,
        ));
    }

    function getUser($username = NULL)
    {
        $req = $this->database->prepare('SELECT * FROM feedme_users WHERE username = ?');
        $req->execute(array($username));

        return $req->fetch();
    }

    function getObjectByParent($parent = NULL)
    {
        $req = $this->database->prepare('SELECT * FROM feedme_object WHERE parent = :parent');
        $req->bindValue(':parent', $parent, PDO::PARAM_INT);

        $req->execute();

        return $req->fetchAll();
    }

    function getRandomObject()
    {
        $req = $this->database->prepare('SELECT * FROM feedme_object WHERE type = object ORDER BY RAND() LIMIT 1');
        $req->execute();

        return $req->fetch();
    }
}

?>
