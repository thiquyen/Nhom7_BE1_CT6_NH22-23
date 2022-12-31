<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/manufactures.php");

$Manufactures = new Manufactures;
if(isset($_POST['submit']))
{
  $manu_name = $_POST['manuname'];
  $insertManuFactures = $Manufactures->insertManuFactures($manu_name);

  header('location: manufactures.php');
}?>