<?php session_start(); ?>
<?php
require("config.php");
require("models/db.php");
require("models/products.php");
require("models/myoder.php");

//orderuser_name
$Order = new Order;

// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();
var_dump($name);
if(isset($_SESSION['user_name']))
{
    $customer_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_name'];
    $created_at = date('Y-m-d h:i:s', time());
    if(isset($_SESSION['cart']))
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            foreach($getAllProducts as $p)
            {
                if($p['id'] == $key)
                {
                    $qty = $value;
                    $sp_id = $p['id'];
                   $insertOrder = $Order->insertOrder($user_id, $sp_id, $qty, $created_at,$customer_name);
                }
            }
        }
    }
    header('location: del.php?id=all');
}
else
{
  header('location: ../weeks11/login/login_form.php');
}
?>
