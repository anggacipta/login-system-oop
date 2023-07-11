<?php

class Dbh {
    protected function connect(){
        try {
            $username = 'root';
            $password = '';
            $dbh = new PDO('mysql:host=localhost;dbname=oop_pdo;', $username, $password);
            return $dbh;
        } catch (TypeError $error) {
            echo $error->getMessage() . "<br/>";
            die();
        }
    }

}