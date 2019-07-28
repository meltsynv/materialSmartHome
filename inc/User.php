<?php
require_once (rtrim($_SERVER['DOCUMENT_ROOT'], '/'). '/materialSmartHome/inc/mysqli.php');



/**
 * User
 */
class User
{
    private $userID;
    private $userName;
    private $userPassword;

    /*constructor*/
    private function __construct($userName, $userPassword, $userID)
    {
        $this->userName = $userName;
        $this->userPassword = $userPassword;
        $this->userID = $userID;
    }

    /*methods*/
    static function getUser($userID){
        $pdo = connect();
        $query = 'SELECT * FROM user WHERE ID = :ID';
        $statement = $pdo->prepare($query);
        if(!$statement->bindValue(':ID', $userID)){
            die($statement->errorInfo());
        }
        if (!$statement->execute()){
            die($statement->errorInfo());
        }

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        return new User($data['ID'], $data['userName'], $data['password']);
    }

    public function update() {
        $pdo = connect();
        $query = 'UPDATE user SET userName = :userName, password = :passsword WHERE ID = :ID';
        $values = array("ID" => $this->userID, "userName" => $this->userName, "password" => $this->userPassword);
        $statement = $pdo->prepare($query);
        if (!$statement->execute($values)) {
            die($statement->errorInfo());
        }
    }

    public static function create($userName, $userPassoword) {
        $pdo = connect();
        $query = 'INSERT INTO user (userName, password) VALUES (:userName, :password)';
        $values = array("userName" => $userName, "password" => $userPassoword);
        $statement = $pdo->prepare($query);
        if(!$statement->execute($values)) {
            die($statement->errorInfo());
        }
        return User::getUser($pdo->lastInsertId());
    }

    /*getter and setter*/

    public function getID(){
        return $this->userID;
    }

    public function getName(){
        return $this->userName;
    }

    public function getPassword(){
        return $this->userPassword;
    }

    public function setName($userName){
        $this->userName = $userName;
    }

    public function setPassword($userPassword){
        $this->userPassword = $userPassword;
    }
}