<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/products.php");

$Products = new Products;
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $manu_id = $_POST['manu_id'];
    $type_id = $_POST['type_id'];
    $feature = isset($_POST['feature'])?1:0;
    $created_at = date('Y-m-d h:i:s', time());
    $id = $_POST['id'];

    $updateProduct = $Products->updateProduct( $name, $manu_id, $type_id, $price, $image, $description, $feature, $created_at,$id);
    $target_dir = "../../../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    header('location:products.php');
}
?>