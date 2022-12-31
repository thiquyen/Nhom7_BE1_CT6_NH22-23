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

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3"></div>
					<!-- Order Details -->
					<div class="col-md-6 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>

							<div class="order-products">
								<?php $totalP = 0;
								if(isset($_SESSION['cart'])): ?>
								<?php foreach($_SESSION['cart'] as $key=>$value): 
								foreach($getAllProducts as $p):
								if($p['id'] == $key):?>
								<!-- product -->
								<div class="order-col">
									<div><?= $value ?> <?php echo $p['name']; ?></div>
									<?php if($p['feature'] == 1): ?>
										<div><?php echo number_format($p['price'] * 0.8); ?>VNĐ</div>
										<?php $totalP += ($p['price'] * 0.8) * $value; ?>
									<?php else : ?>
										<div><?php echo number_format($p['price']); ?>VNĐ</div>
										<?php $totalP += ($p['price'] * 0.8) * $value; ?>
									<?php endif; ?>

								</div>
								<?php endif; endforeach; endforeach; endif;?>
								<!-- /product -->
							</div>	

							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total"><?php echo number_format($totalP); ?>VNĐ</strong></div>
							</div>
						</div>
						<a href="Oder.php" class="primary-btn order-submit">Place order</a>
					</div>
					<!-- /Order Details -->
					<div class="col-md-3"></div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

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
