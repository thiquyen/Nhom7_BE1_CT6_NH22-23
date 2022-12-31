<?php 
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/user.php");

if(isset($_POST['submit'])){
 //   $name = ($_POST['name']);
  ///  $email = ($_POST['email']);
    $password = ($_POST['password']);
   $name = ($_POST['name']) ;
    $User = new User;   
    $updateUser = $User->updateUser($password,$name);
    
   header('location: users.php');
}

?>