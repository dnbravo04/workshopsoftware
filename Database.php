<?php

class Database
{
    private $host;
    private $dbname;
    private $user;
    private $password;

    public function __construct($host, $dbname, $user, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query($sql)
    {
        $pdo = $this->connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
