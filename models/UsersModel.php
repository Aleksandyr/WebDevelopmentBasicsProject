<?php

class UsersModel extends BaseModel
{
    public function getByName($username){
        $statement = self::$db->prepare("SELECT id, username FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        return $statement->get_result()->num_rows;
    }

    public function getAllUsers(){
        $statement = self::$db->prepare("SELECT id, username FROM users ");
        $statement->execute();
        $restult = $statement->get_result()->fetch_all();
        return $restult;
    }

    public function setUserToBeAdmin($id){
        $statement = self::$db->prepare("UPDATE users
                                            SET is_admin = 1
                                            WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
    }

    public function setUserToBeEditor($id){
        $statement = self::$db->prepare("UPDATE users
                                            SET is_editor = 1
                                            WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
    }
}