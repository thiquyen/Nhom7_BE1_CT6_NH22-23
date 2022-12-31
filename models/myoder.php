<?php
class Order extends Db
{
    public function insertOrder($user_id, $sp_id, $qty, $created_at,$customer_name)
    {
        $sql = self::$connection->prepare("INSERT INTO `user_oder` (`user_id`, `sp_id`, `qty`, `created_at`,`customer_name`) VALUES (?, ?, ?, ?,?)");
        $sql->bind_param("iiiss", $user_id, $sp_id, $qty, $created_at,$customer_name);
        $sql->execute(); //return an object
        $items = array();
        return $items; //return an array
    }
    public function getCountByUserId($user_id)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) FROM `user_oder` WHERE user_id = ?");
        $sql->bind_param("i", $user_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);     
        return $items; //return an array
    }
    public function getAllOrderNew()
    {
        $sql = self::$connection->prepare("SELECT * FROM `user_oder` ORDER BY created_at DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
?>