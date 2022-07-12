<?php
class DatabaseConnect
{
    private $host;
    private $user;
    private $pw;
    private $database;


    function __construct($host, $user, $pw, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pw = $pw;
        $this->database = $database;
    }


    public function db_connect()
    {
        $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . '', $this->user, $this->pw) or die("Cannot connect to mySQL.");

        return $db;
    }

}



?>