<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/protypes.php");

$Protypes = new Protypes;
  if(isset($_POST['submit'])){
    $type_name = $_POST['type_name'];
   $type_id = $_POST['type_id'];
    $Protypes->updateprotypes($type_name,$type_id);

   // $target_dir = "../img/";
  //  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  //  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    header('location:protypes.php');
}
