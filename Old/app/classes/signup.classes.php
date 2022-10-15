<?php
include "../../app/config/config.php";
// Database related stuff, like running a query, you will do it in this folder signup.classes.php

// namespace App\app\classes;
// use App\app\config\connect as connect;
class Signup extends Dbh {
    protected function setUser($uid, $pwd, $email) {
        $stmt  = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            /*header("location: <?php echo ROOT; ?>/app/pages/dashboard.php");*/
            header("../../app/pages/dashboard.php");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($uid, $email) {
        $stmt  = $this->connect()->prepare('SELECT users_uid, FROM users WHERE users_id = ? OR users_email = ?;');
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            /*header("location: <?php echo ROOT; ?>/app/pages/dashboard.php");*/
            header("../../app/pages/dashboard.php");
            exit();
        }

        $resultCheck;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}


