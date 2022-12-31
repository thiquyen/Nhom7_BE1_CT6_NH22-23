<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/protypes.php");

$Protypes = new Protypes;
if (isset($_POST['submit'])) {
    # code...
    $type_name = $_POST['type_name'];

    $addprotypes = $Protypes->addprotypes($type_name);
    header('location:protypes.php'); 
}