<?php

class loginService extends DB {

    private $username;
    private $email;
    private $password;
    private $db;

    public function __construct() 
    { 
        if(isset($_POST['submit'])) 
        {
            if((isset($_POST['email']) || isset($_POST['username']) && isset($_POST['password'])) && (!empty($_POST['email']) || !empty($_POST['username']) && !empty($_POST['password']))) {
                $this->email = trim($_POST['email']); 
                $this->username = trim($_POST['username']); 
                $this->password = trim($_POST['password']);
         
                // Perhaps this is not needed if we can log in with username or email??
                // if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $usernameE5xists = $this->db->prepare("SELECT username FROM users WHERE username = :username");
                    $usernameExists->bindParam(':username', $this->username);
                    $usernameExists->execute();            
                    $resultsUsername = $usernameExists->fetchAll(PDO::FETCH_ASSOC);

                    $emailExists = $this->db->prepare("SELECT * FROM users WHERE email = :email ");
                    $emailExists->bindParam(':email', $this->email);
                    $emailExists->execute();
                    $resultsEmail = $emailExists->fetchAll(PDO::FETCH_ASSOC);

                    if($resultsUsername->rowCount() > 0) 
                    {
                        $getRow = $usernameExists->fetchAll(PDO::FETCH_ASSOC);
                        if(password_verify($password, $getRow['password'])) 
                        {
                            unset($getRow['password']);
                            $_SESSION = $getRow;
                            // delete the next line after tests
                            responseService::set("SUCCESS, You loged in with username");
                            header('location:'.ROOT_PATH.'/app/pages/dashboard.php');
                            exit();
                        } 
                        else 
                        {
                            $errors[] = responseService::set("Wrong username or password");
                        }
                    } 
                    else if ($emailExists->rowCount() > 0) 
                    {
                        if (password_verify($password, $getRow['password'])) 
                        {
                            unset($getRow['password']);
                            $_SESSION = $getRow;
                            // delete the next line after tests
                            responseService::set("SUCCESS, You loged in with email");
                            header('location:'.ROOT_PATH.'/app/pages/dashboard.php');
                            exit();
                        }
                    } 
                    else 
                    {
                        $errors[] = responseService::set("Wrong email or password");
                    }
                // Perhaps this is not needed if email validator is not needed
                // } 
                // else 
                // {
                // $errors[] = "Email address is not valid";	
                // 
                // }
            } 
            else 
            {
                $errors[] = responseService::set("Email or username and password are required");	
            }         
        }
    }
}