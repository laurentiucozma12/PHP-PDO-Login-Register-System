<?php
class registerService extends DB {

    private $username;
    private $email;
    private $password;
    private $db;

    public function __construct() {
        $this->username = $_POST["username"];
        $this->email = $_POST["email"];
        $this->password = $_POST["password"];
        $this->db = (new DB)->conn;

        if ($this->username && $this->email && $this->password) {
            $this->post();
        }

        if (!$this->username) {
            responseService::set("No username");
        }
    }

    private function post() { 
        $sql = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $sql->bindParam(":username", $this->username);
        $sql->bindParam(":email", $this->email);
        $sql->bindParam(":password", $this->password);
        $sql->execute();
        
        header('Location: '.$_SERVER['REQUEST_URI']);
    }
}
?>