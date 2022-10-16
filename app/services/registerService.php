<?php
include ROOT_PATH."/app/services/responseService.php";

class registerService extends DB {

    private $username;
    private $email;
    private $password;
    private $db;

    public function __construct() {

        $username = isset($_POST["username"]);
        $email = isset($_POST["email"]);
        $password = isset($_POST["password"]);

        $this->username = ($username && $username != "") ? $_POST["username"] : null;
        $this->email = ($email && $email != "") ? $_POST["email"] : null;
        $this->password = ($password && $password != "") ? $_POST["password"] : null;
        $this->db = (new DB)->conn;

        if ($this->username === null) {            
            responseService::set("Username is null");
        } else if ($this->email === null) {            
            responseService::set("Email is null");
        } else if ($this->password === null) {            
            responseService::set("Password is null");
        } else if (strlen($this->username) < 4) {
            responseService::set("Username lower than 4 characters");
        } else if (strlen($this->email) < 4) {
            responseService::set("Email lower than 4 characters");
        } else if (strlen($this->password) < 8 && strlen($this->password) > 20) {
            responseService::set("Password lower than 8 characters or bigger than 20 characters");
        } else {
            $this->post();
        }   
        
        // This is not working
        // return (strlen($this->username) <= 4) ? responseService::set("No username")
        //      : (strlen($this->email) <= 4) ? responseService::set("No email")
        //      : (strlen($this->password) < 8) ? responseService::set("No good password")
        //      : $this->post(); 
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