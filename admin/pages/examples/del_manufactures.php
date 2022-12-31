<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/manufactures.php");

if(isset($_GET['manuid'])){
    $manu_id = intval($_GET['manuid']) ;
}

$Manufactures = new Manufactures;
$getManufacturesById  = $Manufactures->getManufacturesById($manu_id);

$deleteManufactures = $Manufactures->deleteManufactures($manu_id);
 if (($getManufacturesById == 0)) {
     echo "Co the xoa";
 }
 else{
     echo"Khong the xoa";
 }

header('location: manufactures.php');
?>