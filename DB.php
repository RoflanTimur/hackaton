<?php

class DB
{
    private PDO $conn;

    public function __construct() {
        $this->conn = new PDO(
            "mysql:dbname=hackathon_db; host=127.0.0.1",
            'mysql',
            'mysql'
        );
        $this->conn->exec("SET NAMES 'utf-8'");
        $this->conn->exec("SET CHARACTER SET 'utf8'");
    }

    public function addUser($phone, $name) {
        $sql = 'INSERT INTO test SET phone = :phone, name = :name';
        $query = $this->conn->prepare($sql);
        $query->execute(
            array(
                ':phone' => $phone,
                ':name' => $name
            )
        );

        if($query) {
            return "true";
        }
        return "false";
    }

    public function getUser($phone) {

        $sql = 'SELECT * FROM test WHERE phone = :phone';
        $query = $this->conn->prepare($sql);
        $query->execute(
            array(
                ':phone' => $phone
            )
        );
        $data = $query->fetchObject();
        return $data->name;
    }

}