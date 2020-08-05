<?php

class Connection {
    public $conn;

    public function __construct() {
        $this->conn = new PDO( "mysql:host=localhost;dbname=phpajax", 'root', '' );
    }

    public function insertData( $firstName, $lastName, $age, $homeTown, $job ) {
        $statement = $this->conn->prepare( "INSERT INTO info(firstName,lastName,age,homeTown,job) VALUES(:firstName,:lastName,:age,:homeTown,:job)" );
        $statement->execute( array(
            ':firstName' => $firstName,
            ':lastName'  => $lastName,
            ':age'       => $age,
            ':homeTown'  => $homeTown,
            ':job'       => $job,
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
            ':comment'   => $comment,
        ) );
    }
}