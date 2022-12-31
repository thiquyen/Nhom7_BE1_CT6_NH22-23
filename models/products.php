<?php

class Products extends Db
{
    public function getCountProducts()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) FROM products WHERE id");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);     
        return $items; //return an array
    }
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY 'id' DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
     //add products
    public function addProducts($name,$manu_id,$type_id,$price,$image,$description,$feature,$created_at)
    {
        $sql = self::$connection->prepare("INSERT INTO products(`id,`name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, 
        `created_at`) 
        VALUES (?,?,?,?,?,?,?,?)");
        $sql->bind_param("siiissis",$name,$manu_id,$type_id,$price,$image,$description,$feature,$created_at);
        $sql->execute(); //return an object
        //  $items = array();
        // $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
         //return $items; //return an array
    }
    //delete products
    public function deleteProducts($id)
    {

        $sql = self::$connection->prepare("DELETE FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); 

    }
    //update products
    public function updateProduct( $name, $manu_id, $type_id, $price, $image, $description, $feature, $created_at,$id)
    {
        if($image != ""){
            $sql = self::$connection->prepare("UPDATE `products` SET name=?, manu_id=?, type_id=?, price=?, image=?, description=?, feature=?, created_at=? WHERE id= ?");
        $sql->bind_param("siiissisi", $name, $manu_id, $type_id, $price, $image, $description, $feature, $created_at, $id); 
        }
        else{
            $sql = self::$connection->prepare("UPDATE `products` SET name=?, manu_id=?, type_id=?, price=?, description=?, feature=?, created_at=? WHERE id= ?");
            $sql->bind_param("siiisisi", $name, $manu_id, $type_id, $price, $description, $feature, $created_at, $id);       
        }
        $sql->execute(); //return an object
    }
    public function getAllProductsNew()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY created_at DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsByTypeId($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `description` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsLimit3()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY feature = 1 DESC LIMIT 3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsLimit66()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY feature = 1 DESC LIMIT 6, 6");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsLimit6()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY feature = 1 DESC LIMIT 6");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsLimit12()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY feature = 1 DESC LIMIT 12");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }   
    public function getAllProductsSelling()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE feature = 1");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllProductsByTypeIdSelling($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE feature = 1 AND type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsForPage($offset)
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY id ASC LIMIT 6 OFFSET ?");
        $sql->bind_param("i", $offset);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

}
?>

<!-- i: biến tương ứng có kiểu int-->
<!-- d: biến tương ứng có kiểu float-->
<!-- s: biến tương ứng có kiểu string-->
<!-- b: biến tương ứng là một đốm màu và sẽ được gửi trong các gói-->