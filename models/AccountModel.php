<?php

class AccountModel extends BaseModel{
    public function register($username, $password){
        $statement = self::$db->prepare("SELECT COUNT(id) FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        if($result['COUNT(id)']){
            return false;
        }

        $hash_pass = password_hash($password, PASSWORD_BCRYPT);

        $registerStatement = self::$db->prepare("INSERT INTO users (username, password, cash) VALUES (?, ?, 1000)");
        $registerStatement->bind_param("ss", $username, $hash_pass);
        $registerStatement->execute();
        return true;
    }

    public function login($username, $password){
        $statement = self::$db->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if(password_verify($password, $result['password']) && ['username'] != null || $result['username'] != ''){
            return true;
        }

        return false;
    }

    public function isAdmin($username){
        $statement = self::$db->prepare("SELECT is_admin FROM users WHERE username = ?");;
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_row();
        if($result[0]){
            return true;
        }

        return false;
    }

    public function isEditor($username){
        $statement = self::$db->prepare("SELECT is_editor FROM users WHERE username = ?");;
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_row();
        if($result[0]){
            return true;
        }

        return false;
    }

    public function getCash($username){
        $statement = self::$db->prepare("SELECT cash FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        return $statement->get_result()->fetch_row();
    }
}