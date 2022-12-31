
  <?php
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/products.php");
require("../../../models/protypes.php");
require("../../../models/manufactures.php");
require("../../../models/user.php");

// Products
$Products = new Products;
//$getAllProductsNew = $Products->getAllProducts();
if(isset($_GET['id'])){
    $id =  ($_GET['id']); 
    $p = $Products->getProductsById($id);
  // var_dump($p); 
}
//$getProductsById = $Products->getProductsById(intval($id));
//var_dump($getProductsById[0]['id']); exit;

// Protypes 
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();

// Manufactures
$Manufactures = new Manufactures;
$getAllManufactures = $Manufactures->getAllManufactures();
?>

<?php include("header.php") ?>

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
              <li class="breadcrumb-item active"><a href="products.php"></i>Products</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="edit-products.php" method="post" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Information</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="hidden" name="id" value="<?php echo $p[0]['id'] ?>">
                <input value="<?php echo $p[0]['name'] ?>" name="name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Price</label>
                <input value="<?php echo $p[0]['price'] ?>" name="price" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Image</label>
                <input name="image" type="file" id="inputName" class="form-control">
                <img style="width:200px" src="../../../img/<?php echo $p[0]['image'] ?>" alt="">
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea name="description" id="inputDescription" class="form-control" rows="4">
                <?php echo $p[0]['description'] ?>
                </textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Manufacture</label>
                <select name="manu_id" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php
                  $getAllManufactures = $Manufactures->getAllManufactures();;
                  foreach($getAllManufactures as $value):
                    if($value['manu_id'] == $p[0]['manu_id']): ?>
                    <option selected value="<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></option>
                    <?php
                    else:
                   ?>
                  <option value="<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></option>
                  <?php endif; endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Protype</label>
                <select name="type_id" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php
                  $getAllProtypes = $Protypes->getAllProtypes();
                  foreach($getAllProtypes as $value):
                    if($value['type_id'] == $p[0]['type_id']): ?>
                     <option selected value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                    <?php
                    else:
                   ?>
                  <option value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                  <?php endif; endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">feature</label>
                <?php 
                if($p[0]['feature'] == 1): ?>
                <input checked name="feature" type="checkbox" id="inputClientCompany" class="form-control">
                <?php
                else:
                ?>
                <input name="feature" type="checkbox" id="inputClientCompany" class="form-control">
                <?php endif; ?>
              </div>             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>      
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input name="submit" type="submit" value="Edit Product" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
