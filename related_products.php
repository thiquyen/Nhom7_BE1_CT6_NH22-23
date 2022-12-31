<!-- Section -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php foreach($getProductsByTypeId as $value1): 
											foreach($getAllProtypes as $value2): 
												if($value1['type_id'] == $value2['type_id']): ?>
										<div class="product">
											<div class="product-img">
												
												<img style="height: 200px;" src="./img/<?php echo $value1['image']; ?>" alt="">
												<div class="product-label"><!-- <span class="sale">-30%</span><span class="new">NEW</span> --></div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $value2['type_name']; ?></p>
												<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>"><?php echo $value1['name']; ?></a></h3>
												<h4 class="product-price"> <?php echo number_format($value1['price']); ?>VNĐ<!--<del class="product-old-price">VNĐ</del>--></h4>
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
										<?php endif; endforeach; endforeach;?>
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->