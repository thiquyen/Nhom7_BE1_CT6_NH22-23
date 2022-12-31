
  <?php
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/products.php");
require("../../../models/protypes.php");
require("../../../models/manufactures.php");
require("../../../models/user.php");

// Products
$Products = new Products;
$getAllProductsNew = $Products->getAllProducts();

//var_dump($getProductsById[0]['id']); exit;

// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();

// Manufactures
$Manufactures = new Manufactures;
//$getAllManufactures = $Manufactures->getAllManufactures();
if(isset($_GET['manuid'])){
  $manu_id = ($_GET['manuid']); 
  $p = $Manufactures->getManufacturesById(($manu_id));
  var_dump($p);
}

?>

<?php include("header.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manu Factures</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="manufactures.php"></i>Manu Factures</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="edit-manufactures.php" method="post" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
      <div class="col-md-3">
      </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Updata Manu Factures</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Manu_Name</label>
                <input type="hidden" name="manu_id" value="<?php echo $p[0]['manu_id'] ?>">
                <input type="text" id="inputName" name="manu_name" value="<?php  echo $p[0]['manu_name'] ?>" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
      <div class="col-3"></div>
        <div class="col-6">
          <a href="products.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Updata Protypes" class="btn btn-success float-right">
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
