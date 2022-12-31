<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/manufactures.php");

$Manufactures = new Manufactures;
 if(isset($_POST['submit']))
{
    $manu_name = $_POST['manu_name'];
    $manu_id = $_POST['manu_id'];
    $Manufactures->updataManufactures($manu_name,$manu_id);  

    header('location: manufactures.php');   
}?>