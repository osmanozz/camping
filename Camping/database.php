<?php

class database{
    private $host;
    private $username;
    private $password; 
    private $database;
    private $dbh;

    public function __construct(){
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = 'Osmanosman1.';
        $this->database = 'campingdb';

        try {
            $dsn = "mysql:host=$this->host;dbname=$this->database";
            $this->dbh = new PDO($dsn, $this->username, $this->password);

        } catch (PDOException $exception) {
            die("Connection failed!-> " . $exception.getMessage());
        }
    }

    public function select($sql, $placeholder){

        $statement = $this->dbh->prepare($sql);
        $statement->execute($placeholder);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function edit($sql, $placeholder, $file) {
        $statement = $this->dbh->prepare($sql);
        $statement->execute($placeholder);
        header("location: " . $file);
    }

    public function delete($sql, $placeholder, $file) {

        $statement = $this->dbh->prepare($sql);
        $statement->execute($placeholder);
        header("location: " . $file);
        exit;
    }
    public function add($sql, $placeholder, $file) {

        $statement = $this->dbh->prepare($sql);
        $statement->execute($placeholder);
        header("location: " . $file);
        exit;
    }
}


?>