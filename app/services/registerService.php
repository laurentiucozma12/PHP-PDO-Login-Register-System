<?php
include ROOT_PATH."/app/services/responseService.php";

class registerService extends DB {

    private $username;
    private $email;
    private $password;
    private $repet_password;
    private $db;

    public function __construct() {

        $this->username = isset($_POST["username"]) && !empty($_POST["username"]) ? $_POST["username"] : null;
        $this->email = isset($_POST["email"]) && !empty($_POST["email"]) ? $_POST["email"] : null;
        $this->password = isset($_POST["password"]) && !empty($_POST["password"]) ? $_POST["password"] : null;
        $this->repet_password = isset($_POST["repeat_password"]) && !empty($_POST["repeat_password"]) ? $_POST["repeat_password"] : null;
        $this->db = (new DB)->conn;

        if ($this->username === null) {            
            responseService::set("Username is null");
        } else if ($this->email === null) {            
            responseService::set("Email is null");
        } else if ($this->password === null) {            
            responseService::set("Password is null");
        } else if ($this->repet_password === null) {            
            responseService::set("Repeat Password is null");
        } else if (strlen($this->username) < 4) {
            responseService::set("Username lower than 4 characters");
        } else if (strlen($this->email) < 4) {
            responseService::set("Email lower than 4 characters");
        } else if (strlen($this->password) < 8) {
            responseService::set("Password lower than 8 characters");
        } else {
            $this->post();
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