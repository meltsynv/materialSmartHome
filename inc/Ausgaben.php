<?php
require_once (rtrim($_SERVER['DOCUMENT_ROOT'], '/'). '/materialSmartHome/inc/mysqli.php');

/**
 * Class Ausgaben
 */
class Ausgaben
{
    private $id;
    private $name;
    private $geld;

    /*constructor*/
    private function __construct($id, $name, $geld)
    {
        $this->id = $id;
        $this->name = $name;
        $this->geld = $geld;
    }

    /*methods*/
    public function getSumGeld()
    {
        $pdo = connect();
        $query = 'SELECT SUM(Geld) as Geld FROM ausgaben';
        $statement = $pdo->prepare($query);
        if (!$statement->execute()) {
            die($statement->errorInfo());
        }

        $list = array();

        while ($l = $statement->fetch(PDO::FETCH_ASSOC)){
         array_push($list, new Ausgaben($l['Geld']));
        }

        return $list;
    }

    public function calcProcend()
    {
        $list = Ausgaben::getAllAusgaben();
        foreach ($list as $value => $l) {

        }

        Ausgaben::getSumGeld();

        $user = Ausgaben::getByName('Karo');
    }

    public function getAllAusgaben()
    {
        $pdo = connect();
        $query = 'SELECT * FROM ausgaben';
        $statement = $pdo->prepare($query);
        if (!$statement->execute()) {
            die($statement->errorInfo());
        }

        $list = array();
        while ($l = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($list, new Ausgaben($l['ID'], $l['Name'], $l['Geld']));
        }

        return $list;
    }

    public function getByName($name){
        $pdo = connect();
        $query = 'SELECT * FROM ausgaben WHERE Name = :Name';
        $statement = $pdo->prepare($query);
        if (!$statement->bindValue(':Name', $name)) {
            die($statement->errorInfo());
        }
        if (!$statement->execute()) {
            die($statement->errorInfo());
        }

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        return new Ausgaben($data['ID'], $data['Name'], $data['Geld']);
    }

    public function getAusgaben($id)
    {
        $pdo = connect();
        $query = 'SELECT * FROM ausgaben WHERE ID = :ID';
        $statement = $pdo->prepare($query);
        if (!$statement->bindValue(':ID', $id)) {
            die($statement->errorInfo());
        }
        if (!$statement->execute()) {
            die($statement->errorInfo());
        }

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        return new Ausgaben($data['ID'], $data['Name'], $data['Geld']);
    }

    public static function create($name, $geld)
    {
        $pdo = connect();
        $query = 'INSERT INTO ausgaben (Name, Geld) VALUES (:Name, :Geld)';
        $values = array("Name" => $name, "Geld" => $geld);
        $statement = $pdo->prepare($query);
        if (!$statement->execute($values)) {
            die($statement->errorInfo());
        }
        return Einkaufsliste::getEinkaufsliste($pdo->lastInsertId());
    }

    /*getter and setter*/
    public function getID()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGeld()
    {
        return $this->geld;
    }

    public function setGeld($geld)
    {
        $this->name = $geld;
    }

}

Ausgaben::calcProcend();

