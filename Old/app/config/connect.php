<?php
class Dbh {
    protected $conn;

    protected function __construct() {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $name = 'signup_login';
        try {
            $this->$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $name . ';charset=utf8', $username, $password);
            $this->$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }  
}

?>