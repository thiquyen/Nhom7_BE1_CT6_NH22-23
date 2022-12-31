<?php session_start(); ?>
<?php
require("config.php");
require("models/db.php");
require("models/products.php");
require("models/protypes.php");
require("models/manufactures.php");
require("models/user.php");

// User
$User = new User;

// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();
if(isset($_GET['typeid']))
{
	$type_id = $_GET['typeid'];
}
$getProductsByTypeId = $Products->getProductsByTypeId($type_id);
$getProductsLimit3 = $Products->getProductsLimit3();
// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();

// Manufactures
$Manufactures = new Manufactures;
$getAllManufactures = $Manufactures->getAllManufactures();
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
							<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										Tivi
										<small>(120)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-2">
									<label for="category-2">
										<span></span>
										Tai nghe
										<small>(740)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-3">
									<label for="category-3">
										<span></span>
										Điện Thoại
										<small>(1450)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-4">
									<label for="category-4">
										<span></span>
										LapTop
										<small>(578)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-5">
									<label for="category-5">
										<span></span>
										Tủ lạnh
										<small>(120)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
							<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										Apple 
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										Samsung 
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										LG 
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
									    Senko 
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										Toshiba 
										<small>(125)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							<?php foreach($getProductsLimit3 as $value1): 
								foreach($getAllProtypes as $value2): 
								if($value1['type_id'] == $value2['type_id']): ?>
							<div class="product-widget">
								<div class="product-img">
								<img  src="./img/<?php echo $value1['image']; ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php echo $value2['type_name']; ?></p>
									<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"><?php echo $value1['name']; ?></a></h3>
									<h4 class="product-price"><?php echo number_format($value1['price']) ?>VNĐ <!--<del class="product-old-price">VNĐ</del>--></h4>
								</div>
							</div>
							<?php endif; endforeach; endforeach; ?>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<?php foreach($getProductsByTypeId as $key => $value1):
								foreach($getAllProtypes as $value2): 
								if($value1['type_id'] == $value2['type_id']): ?>
							<!-- product -->							
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img style="height: 200px;" src="./img/<?php echo $value1['image'] ?>" alt="">
										<div class="product-label"><!-- <span class="sale">-30%</span><span class="new">NEW</span> --></div>
									</div>
									<div class="product-body">
										<p class="product-category"> <?php echo $value2['type_name'] ?></p>
										<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"><?php echo $value1['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value1['price']) ?>VNĐ  <!--<del class="product-old-price">VNĐ</del>--></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<button class="quick-view"><a href="product.php?id=<?php echo $value1['id'] ?>"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>
										</div>
									</div>
									<div class="add-to-cart">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="index.php?id=<?php echo $value1['id'] ?>">add to cart</a></button>
									</div>
								</div>
							</div>
							<!-- /product -->
							<?php if($key == 1 || $key == 3):?> <div class="clearfix visible-sm visible-xs"></div> <?php endif;?>
							<?php if($key == 2):?> <div class="clearfix visible-lg visible-md"></div> <?php endif;?>
							<?php if($key == 5):?> <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div> <?php endif;?>
							<?php endif; endforeach; endforeach;?> 
							
						
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
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
