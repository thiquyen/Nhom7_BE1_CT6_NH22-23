<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/products.php");
 $Products = new Products;
if(isset($_POST['submit']))
  {
    $name  = $_POST['name'];
  $manu_id = $_POST['manu_id'];
  $type_id = $_POST['type_id'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name']; 
  $description = $_POST['description'];
  $feature = isset($_POST['feature'])?1:0;
  $created_at = date('Y-m-d h:i:s', time());

    
 $addProducts = $Products->addProducts($name, $manu_id, $type_id, $price, $image, $description, $feature, $created_at);
  $target_dir = "../../../img/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  header('location:products.php'); 
  }?>