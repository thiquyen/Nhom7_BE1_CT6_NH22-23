<?php

class User extends Db
{
    public function checkLogin($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $password = md5($password); // ma hoa md5
        $sql->bind_param("ss", $username, $password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getUserByUserId($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM user_form WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM user_form");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function updateUser($password,$name)
    {
        $sql = self::$connection->prepare("UPDATE user_form SET password = ? WHERE name = ?");
        $sql->bind_param("ss",$password,$name);
        $sql->execute();
    }

  
}
?>