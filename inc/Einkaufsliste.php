<?php
require_once (rtrim($_SERVER['DOCUMENT_ROOT'], '/'). '/materialSmartHome/inc/mysqli.php');

/**
 * Class Einkaufsliste
 */
class Einkaufsliste
{
    private $id;
    public $name;
    public $status;

    /*constructor*/
    private function __construct($id, $name, $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
    }

    /*methods*/
    public function getAllEinkaufsliste(){
        $pdo = connect();
        $query = 'SELECT * FROM einkaufsliste';
        $statement = $pdo->prepare($query);
        if (!$statement->execute()){
            die($statement->errorInfo());
        }

        $list = array();
        while ($l = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($list, new Einkaufsliste($l['ID'], $l['Name'], $l['Status']));
        }

        return  $list;
    }

    public function delete(){
        $pdo = connect();
        $query = 'DELETE FROM einkaufsliste WHERE ID = :ID';
        $values = array("ID" => $this->id);
        $statement = $pdo->prepare($query);
        if (!$statement->execute($values)) {
            die($statement->errorInfo());
        }
    }

    public function update(){
        $pdo = connect();
        $query = 'UPDATE einkaufsliste SET Name = :Name, Status = :Status WHERE ID = :ID';
        $values = array("ID" => $this->id, "Name" => $this->name, "Status" => $this->status);
        $statement = $pdo->prepare($query);
        if (!$statement->execute($values)) {
            die($statement->errorInfo());
        }
    }

    public static function create($name, $status){
        $pdo = connect();
        $query = 'INSERT INTO einkaufsliste (Name, Status) VALUES (:Name, :Status)';
        $values = array("Name" => $name, "Status" => $status);
        $statement = $pdo->prepare($query);
        if(!$statement->execute($values)) {
            die($statement->errorInfo());
        }
        return User::getUser($pdo->lastInsertId());
    }

    /*getter and setter*/
    public function getID(){
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setStatus($status){
        $this->status = $status;
    }
}