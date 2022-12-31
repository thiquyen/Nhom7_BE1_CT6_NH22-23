<?php session_start(); ?>

<?php
require("config.php");
require("models/db.php");
require("models/products.php");
require("models/protypes.php");
require("models/manufactures.php");
require("models/myoder.php");

//order
$Order = new Order;

// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();
$getAllProductsNew = $Products->getAllProductsNew();
$getProductsLimit3 = $Products->getProductsLimit3();
$getProductsLimit6 = $Products->getProductsLimit6();
$getProductsLimit66 = $Products->getProductsLimit66();
$getProductsLimit12 = $Products->getProductsLimit12();
$getAllProductsSelling = $Products->getAllProductsSelling();

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();
?>

        <!-- HEADER -->
        <?php include("header.php"); ?>
        <!-- /HEADER -->		

		<!-- NEWSLETTER -->
        <div id="" class="">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="text-center">
							<h1>Your cart</h1>
							<?php if(isset($_SESSION['cart'])&&count($_SESSION['cart'])):
									if(isset($_SESSION['cart'])): ?>
									<table border="1" cellspacing="0" cellpadding="5" style="margin: 50px 0px 0px 80px;">
										<tr	>
										    <th style="width: 6%">Image</th>
											<th style="width: 20%%">Name</th>
											<th style="width: 2%">Quantity</th>
											<th style="width: 2%">Price</th>
											<th style="width: 2%">Add</th>
											<th style="width: 2%">Remove</th>
										</tr>
										<?php $total = 0;?>
										<?php foreach($_SESSION['cart'] as $key=>$value): 
										foreach($getAllProducts as $p):
												if($p['id'] == $key): ?>
												<tr>
													<td><img src="./img/<?php echo $p['image']; ?>" alt="" width="100"></td>	
													<td><?php echo $p['name'] ?></td>
													<td> <?= $value ?></td>
													<?php if($p['feature'] == 1): ?>
														<td><?php echo number_format($p['price'] * 0.8 * $value) ?></td>
													<?php else: ?>
														<td><?php echo number_format($p['price'] * $value) ?></td>
													<?php endif; ?>
													<td>
														<a href="blank.php?id=<?php echo $key ?>"><i class="fa fa-plus-square"></i></a>
														<a href="cart_Sub.php?id=<?php echo $key  ?>"><i class="fa fa-minus-square"></i></a>
													</td>		
													<td><a href="del.php?id=<?php echo $key ?>"><i class="fa fa-trash-o"></a></td>
												</tr>
												<?php endif; endforeach; endforeach; ?>									
											</table>
											<a style="margin: 50px 0px 0px;" class="primary-btn cta-btn" href="checkout.php">Thanh toán</a>
											<?php endif; else :?>
												<?php echo "<h1>Chưa có sản phẩm nào trong giỏ</h1>"; endif; ?>			
						</div>						
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<?php include("footer.php"); ?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
