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
$getAllOrderNew = $Order->getAllOrderNew();

// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();

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
							<h1>Your Order</h1>
							<table>
								<tr>
									<th>Image</th>
									<th>Name</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Order Date</th>
								</tr>
								<?php foreach($getAllOrderNew as $value): 
									foreach($getAllProducts as $p):
									if($value['sp_id'] == $p['id']):?>
								<tr>
								    <td><img src="./img/<?php echo $p['image']; ?>" alt="" width="100"></td>	
									<td><?php echo $p['name'] ?></td>
									<th><?php echo $value['qty'] ?></th>
									<?php if($p['feature'] == 1): ?>
										<td><?php echo number_format($p['price'] * 0.8 * $value['qty']) ?></td>
									<?php else: ?>
										<td><?php echo number_format($p['price'] * $value['qty']) ?></td>
									<?php endif; ?>
									<th><?php echo $value['created_at']?></th>
								</tr>
								
								<?php endif; endforeach; endforeach;  ?>								
							</table>		
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
