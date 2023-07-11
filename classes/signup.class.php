<?php

class Signup extends Dbh{

    protected function setUser($uid, $pwd, $email){
        $stmt = $this->connect()->prepare('INSERT INTO users_login (users_uid, users_password, users_email) VALUES (?, ?, ?);');

        $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashpwd, $email))){
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users_login WHERE users_uid = ? OR users_email = ?;');

        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}