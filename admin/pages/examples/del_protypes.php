<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/protypes.php");

if(isset($_GET['typeid'])){
    $type_id = ($_GET['typeid']) ;
    $Protypes = new Protypes;   
    $deleteProtypes = $Protypes->deleteprotypes($type_id);
    
   header('location: protypes.php');
}

?>