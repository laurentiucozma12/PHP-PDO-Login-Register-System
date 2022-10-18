<?php
include ROOT_PATH."/app/services/responseService.php";

class registerService extends DB {

    private $username;
    private $email;
    private $password;
    private $repeat_password;
    private $db;

    public function __construct() {

        $this->username = isset($_POST["username"]) && !empty($_POST["username"]) ? $_POST["username"] : null;
        $this->email = isset($_POST["email"]) && !empty($_POST["email"]) ? $_POST["email"] : null;
        $this->password = isset($_POST["password"]) && !empty($_POST["password"]) ? $_POST["password"] : null;
        $this->repeat_password = isset($_POST["repeat_password"]) && !empty($_POST["repeat_password"]) ? $_POST["repeat_password"] : null;
        $this->db = (new DB)->conn;

        $uppercase = preg_match('@[A-Z]@', $this->password);
        $lowercase = preg_match('@[a-z]@', $this->password);
        $number    = preg_match('@[0-9]@', $this->password);
        $specialChars = preg_match('@[^\w]@', $this->password);
        $error = false;

        if ($this->username === null) {            
            responseService::set("Username is null");
        } else if ($this->email === null) {            
            responseService::set("Email is null");
        } else if ($this->password === null) {            
            responseService::set("Password is null");
        } else if ($this->repeat_password === null) {            
            responseService::set("Repeat Password is null");
        } else if (strlen($this->username) < 4) {
            responseService::set("Username lower than 4 characters");
        } else if (strlen($this->email) < 4) {
            responseService::set("Email lower than 4 characters");
        } else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($this->password) < 8 || strlen($this->password) > 20) {
            responseService::set("Password should be at least 8 characters in length, 20 character maximum and should include at least one upper case letter, one number, and one special character.");
        } else if ($this->password != $this->repeat_password) {            
            responseService::set("Passwords don't match");
        } else {
            $error = true;
        }

        if ($error == true) {
            $usernameExists = $this->db->prepare("SELECT username FROM users WHERE username = :username");
            $usernameExists->bindParam(':username', $this->username);
            $usernameExists->execute();

            $emailExists = $this->db->prepare("SELECT email FROM users WHERE email = :email");
            $emailExists->bindParam(':email', $this->email);
            $emailExists->execute();

            if ($usernameExists->rowCount() > 0) {
                responseService::set("Username already in use! Choose another one");
            } else if ($emailExists->rowCount() > 0) {            
                responseService::set("Email already in use! Choose another one");
            } else {
                $this->post();
            }  
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