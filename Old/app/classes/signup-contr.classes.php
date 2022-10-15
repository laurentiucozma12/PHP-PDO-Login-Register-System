<?php
// If you want to change something in the database, you will do it in this folder signup-contr.classes.php

class SignupContr extends Signup {

    // this are the properties inside the class
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    // the varriables of the construct ($uid, $pwd, $pwdRepeat, $email), are not the same like the above properties
    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        
        // $this->uid, the uid (the firt one, after "$this") is the property from above, private $uid (line 7)
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../../app/pages/dashboard.php?error=emptyinput");
            exit();
        }

        if ($this->invalidUid() == false) {
            // echo "Invalid username!";
            header("location: ../../app/pages/dashboard.php?error=username");
            exit();
        }

        if ($this->invalidEmail() == false) {
            // echo "Invalid email!";
            header("location: ../../app/pages/dashboard.php?error=email");
            exit();
        }

        if ($this->pwdMatch() == false) {
            // echo "Password don't match!";
            header("location: ../../app/pages/dashboard.php?error=passwordmatch");
            exit();
        }

        if ($this->uidTakenCheck() == false) {
            // echo "Username or email taken!";
            header("location: ../../app/pages/dashboard.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput() {
        $result;
        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidUid() {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this-> uid)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function pwdMatch() {
        $result;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function uidTakenCheck() {
        $result;
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}



