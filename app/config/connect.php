<?php
function pdo_connect_mysql() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $name = 'dbdarkpanel';
    try {
        return $conn = new PDO('mysql:host=' . $servername . ';dbname=' . $name . ';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>