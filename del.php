<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);  
    if ($id == "all") {
        unset($_SESSION['cart']);
    }
}
else{
    unset($_SESSION['cart']);
}
header('location: blank.php');
?>