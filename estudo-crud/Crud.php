<?php 
require '../vendor/autoload.php'; 
require 'Conn.php';

class Crud
{
    private $dbConn;

    public function __construct(Conn $dbConn)
    {
        $this->dbConn = $dbConn->connect();
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM person";

        $stmt = $this->dbConn->query($query);

        return $stmt->fetchAll();
    }

    public function create($request) {
        dump($request);
    }
}

?>