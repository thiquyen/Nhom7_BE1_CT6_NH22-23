<?php
session_start();
		 if(isset($_GET['id']))
		 {
			$id = $_GET['id'];
			if(isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]--;
                if($_SESSION['cart'][$id] == 0){
                   
                     unset($_SESSION['cart'][$id]); 
                    
                }
			}
			else 
			{
				$_SESSION['cart'][$id] = 1;
			}       		 
            
		 }
         header('location: blank.php');  
         
       