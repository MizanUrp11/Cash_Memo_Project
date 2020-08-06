<?php

class Connection {
    public $conn;

    public function __construct() {
        $this->conn = new PDO( "mysql:host=localhost;dbname=phpajax", 'root', '' );
    }

    public function insertData( $productName, $unitPrice, $Stock ) {
        $statement = $this->conn->prepare( "INSERT INTO info(productName,unitPrice,Stock) VALUES(:productName,:unitPrice,:Stock)" );
        $statement->execute( array(
            ':productName' => $productName,
            ':unitPrice'   => $unitPrice,
            ':Stock'       => $Stock
        ) );
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