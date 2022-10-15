<?php
class DB {
    protected $conn;
    protected $SETTINGS = 
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    protected $HOST = "localhost";
    protected $USER = "root";
    protected $PASS = "";
    protected $DB = "signup_login";

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->HOST};dbname={$this->DB}", $this->USER, $this->PASS, $this->SETTINGS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }  
}

?>