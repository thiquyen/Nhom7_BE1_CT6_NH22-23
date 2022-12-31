<?php require("cart.php"); 
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
		table, th, td {
        border: 1px solid black;
        text-align: center;
        padding: 8px 20px;
		}
        </style>

    </head>
	<?php 
	if(isset($_GET['userid']))
	{
	    $user_id = $_GET['userid'];
		$getUserByUserId = $User->getUserByUserId($user_id);
		//var_dump(isset($getUserByUserId[0]['user_id'])); exit;
		var_dump($_SESSION['user_name']);
	}?>
	
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +84 979732835</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> VQT@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						<?php if(!isset($getUserByUserId[0]['user_id'])): ?>
							<li><a href="#"><i class="fa fa-user-o"></i> 
								My Account								
						</a>											
						</li>
						<li class="logout" >
								<a href="../weeks11/login/logout.php"><i class="fa fa-sign-out"></i>						
									Logout: <?php if(isset($_SESSION['user_name'])){
										echo $_SESSION['user_name'];
									} ?>
								</a>
							</li>						
						<?php else: ?>
							<li><a href="#"><i class="fa fa-sign-out"></i><?= $getUserByUserId[0]['username'] ?></a></li>	
							<?php endif; ?>		
					</ul>
					
					
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
						
						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="store.php" method="get">
									<select class="input-select">
										<option value="0">All Categories</option>
										<?php foreach ($getAllProtypes as $value) : ?>
											<option value="1"> <?php echo $value['type_name'] ?> </option>
											<?php endforeach; ?>
									</select>
									<input class="input" name="keyword" placeholder="Search here">
									<button type="submit" class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearflex">
							<div class="header-ctn">
							
								<!-- Wishlist -->
								<div>
									<a href="my_oder.php">
									    <i class="fa fa-truck"></i>
										<span>Your Order</span>
										<?php if(isset($_SESSION['user_id'])): 
											$user_id = $_SESSION['user_id'];
											$getCountByUserId = $Order->getCountByUserId($user_id);?>
										<div class="qty"><? echo $getCountByUserId[0]['COUNT(*)'] ?></div>
										<?php else: ?>
											<div class="qty">0</div>
										<?php endif; ?>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?php echo qty(); ?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<!-- /product -->
											<?php $sumP = 0; $totalP = 0;
											 if(isset($_SESSION['cart'])): ?>
												<?php foreach($_SESSION['cart'] as $key=>$value): 
												foreach($getAllProducts as $p):
													if($p['id'] == $key):?>
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/<?php echo $p['image'] ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="product.php?id=<?php echo $p['id'] ?>"><?php echo	 $p['name'] ?></a></h3>
													<?php if($p['feature'] == 1): ?>
														<h4 class="product-price"><span class="qty"><?= $value ?></span><?php echo number_format($p['price'] * 0.8); ?>VNĐ</h4>
														<?php $totalP += ($p['price'] * 0.8) * $value; ?>
													<?php else: ?>
														<h4 class="product-price"><span class="qty"><?= $value ?></span><?php echo number_format($p['price']); ?>VNĐ</h4>
														<?php $totalP += $p['price'] * $value; ?>
													<?php endif; ?>
												</div>
												<!-- <button class="delete"><i class="fa fa-close"></i></button> -->
											</div>			
											<?php $sumP += $value;?>
											<?php endif; endforeach; endforeach; endif;?>								
											<!-- /product -->
										</div>
										<div class="cart-summary">
											<small><?php echo $sumP ?> Item(s) selected</small>
											<h5>SUBTOTAL: <?php echo number_format($totalP); ?>VNĐ</h5>
										</div>
										<div class="cart-btns">
											<a href="blank.php">View Cart</a>
											<a href="checkout.php">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->
											

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="all.php?page=1">All</a></li>
						<?php foreach ($getAllProtypes as $value): ?>
							<li><a href="store_menu.php?typeid=<?php echo $value['type_id']?>"><?php echo $value['type_name'] ?></a></li>
						<?php endforeach; ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
