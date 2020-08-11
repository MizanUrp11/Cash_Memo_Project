<?php

class Connection {
    public $conn;

    public function __construct() {
        $this->conn = new PDO( "mysql:host=localhost;dbname=freelan6_cash", 'freelan6_cash', '2?]8)f4f?_6@' );
    }

    public function insertData( $productName, $unitPrice, $Stock ) {
        $statement = $this->conn->prepare( "INSERT INTO info(productName,unitPrice,Stock) VALUES(:productName,:unitPrice,:Stock)" );
        $statement->execute( array(
            ':productName' => $productName,
            ':unitPrice'   => $unitPrice,
            ':Stock'       => $Stock
        ) );
    }

    public function insertUser( $userName, $password ) {
        $statement = $this->conn->prepare( "INSERT INTO users(userName,password) VALUES(:userName,:password)" );
        $statement->execute( array(
            ':userName' => $userName,
            ':password' => $password
        ) );
    }

    public function getUsers( $query, $array ) {
        $statement = $this->conn->prepare( $query );
        $statement->execute( $array );
        return $statement->fetchAll();
    }

    public function getAll( $query ) {
        $statement = $this->conn->prepare( $query );
        $statement->execute();
        return $statement->fetchAll();
    }

    public function deleteData( $query ) {
        $statement = $this->conn->prepare( $query );
        $statement->execute();
    }

    public function updateData( $query, $array ) {
        $statement = $this->conn->prepare( $query );
        $statement->execute( $array );
    }
    public function insertCart( $addRemove, $comment ) {
        $statement = $this->conn->prepare( "INSERT INTO cart(addRemove,comment) VALUES(:addRemove,:comment)" );
        $statement->execute( array(
            ':addRemove' => $addRemove,
            ':comment'   => $comment
        ) );
    }
}