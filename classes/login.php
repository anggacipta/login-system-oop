<?php

class Login extends Dbh{

    protected function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare('SELECT users_password FROM users_login WHERE users_uid = ? OR users_email = ?;');

        if(!$stmt->execute(array($uid, $pwd))){
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header('location: ../index.php?error=usersnotfound');
            exit();
        }

        $pwdhash = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdhash[0]['users_password']);

        if ($checkPwd == false)
        {
            $stmt = null;
            header('location: ../index.php?error=wrongpassword');
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users_login WHERE users_uid = ? OR users_email = ? AND users_password = ?;');

            if(!$stmt->execute(array($uid, $uid, $pwd))){
                $stmt = null;
                header('location: ../index.php?error=stmtfailed');
                exit();
            }

            if($stmt->rowCount() == 0)
            {
                $stmt = null;
                header('location: ../index.php?error=usersnotfound');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];

            $stmt = null;
        }

        $stmt = null;
    }
}