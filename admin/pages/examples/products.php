
<?php include("header.php") ?>


<?php
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/products.php");
require("../../../models/protypes.php");
require("../../../models/manufactures.php");
require("../../../models/user.php");


// Products
$Products = new Products;

$getAllProducts = $Products->getAllProducts();
$getCountProducts = $Products->getCountProducts();
$getAllProductsNew = $Products->getAllProductsNew();
$getProductsLimit3 = $Products->getProductsLimit3();
$getProductsLimit6 = $Products->getProductsLimit6();
$getProductsLimit66 = $Products->getProductsLimit66();
$getProductsLimit12 = $Products->getProductsLimit12();
$getAllProductsSelling = $Products->getAllProductsSelling();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="products-add.php"></i>Create new Product</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">                    
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Products</h3>         
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">  
           <?php $page = $_GET['page'];
							$offset = ($page - 1) * 6;
							$getProductsForPage = $Products->getProductsForPage($offset);
							 $totalPages = ceil($getCountProducts[0]['COUNT(*)'] / 6);	// 6: là số product 1 trang
							 //var_dump($totalPages); => check tổng số trang
              // var_dump($_GET['page']);
							?>
               
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 2%">
                          Id
                      </th>
                      <th style="width: 16%">
                          Name
                      </th>
                      <th style="width: 10%">
                          Image
                      </th>
                      <th style="width: 30%">
                          Description
                      </th>
                      <th style="width: 12%" class="text-center">
                          Price
                      </th>
                      <th style="width: 2%" class="text-center">
                          Feature
                      </th>
                      <th style="width: 2%" class="text-center">
                          Manu_id
                      </th>
                      <th style="width: 2%" class="text-center">
                          Type_id
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php foreach($getProductsForPage as $key => $value):?>
              
                  <tr>
                      <td>
                          <?php echo $value['id'] ?>
                      </td>
                      <td>
                          <a>
                            <?php echo $value['name'] ?>
                          </a>
                          <br/>
                          <small>
                              Created <?php echo $value['created_at'] ?>
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="" style="width:100px" class="table-avatar" src="../../../img/<?php echo $value['image'] ?>">
                              </li>
                          </ul>
                      </td>
                      <td class="str"  >     
                                                        
                        <?php                   
                        //echo $value['description']
                        echo substr($value['description'],0,40)
                        ?>...
                      </td>
                      <td class="project-state">
                        <?php echo number_format($value['price'])?> VNĐ
                      </td>
                      <td class="project-state">
                         <?php echo $value['feature'] ?>
                      </td>
                      <td class="project-state">
                         <?php echo $value['manu_id'] ?>
                      </td>
                      <td class="project-state">
                          <?php echo $value['type_id'] ?>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="up_products.php?id=<?= $value['id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="del_products.php?id=<?= $value['id'] ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  <?php endforeach;?>
              </tbody>
              
           
         </table>
         <div class="store-filter clearfix">
							<ul class="store-pagination">
								<?php include("page.php"); ?>
							</ul>
						</div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

    
            <div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<?php include("page.php")  ?>
							</ul>
						</div>
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
