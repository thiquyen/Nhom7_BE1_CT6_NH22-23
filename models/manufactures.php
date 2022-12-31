<?php
class Manufactures extends Db
{
    public function getAllManufactures ()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures ORDER BY 'id' DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getManufacturesById($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function updataManufactures($manu_name,$manu_id)
    {
        $sql = self::$connection->prepare("UPDATE `manufactures` SET manu_name=? WHERE manu_id= ?");
        $sql->bind_param("si", $manu_name, $manu_id);
        $sql->execute(); //return an object
    }
    public function deleteManufactures($manu_id)
    {
        $sql = self::$connection->prepare("DELETE FROM manufactures  where  manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
    }
    public function insertManuFactures($manu_name)
    {
        $sql = self::$connection->prepare("INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES (NULL, ?)");
        $sql->bind_param("s",$manu_name);
        $sql->execute(); //return an object
        $items = array();
        return $items; //return an array
    }
    
}
?>