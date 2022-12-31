<?php
		 if(isset($_GET['id']))
		 {
			$id = $_GET['id'];
			if(isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]++;
			}
			else
			{
				$_SESSION['cart'][$id] = 1;
			}			 
		 }

		 
		 function qty()
			{
				$sum = 0;
				if(isset($_SESSION['cart'])):
				   foreach($_SESSION['cart'] as $key => $qty): // $key: id product
					   if(isset($key)) { $sum++; }			
					   endforeach;
				   else:
					   $sum = 0;
				   endif;		
				   return $sum; 
				   
			}	?>