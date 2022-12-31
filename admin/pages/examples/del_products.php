<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/products.php");


$Products = new Products;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $deleteProducts = $Products->deleteProducts($id);
    
    header('location: products.php');
}
?>