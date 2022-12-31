<?php
include "header.php";
?>
<?php
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/products.php");
require("../../../models/protypes.php");
require("../../../models/manufactures.php");
require("../../../models/user.php");

$User = new User;

if(isset($_GET['id'])):
    $id = $_GET['id'];
    $p = $User -> getUserByUserId($id);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="edituser.php" method="post" enctype="multipart/form-data">
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
                <label for="inputName">Username</label>
                <input type="hidden" name="id" value="<?php echo $p[0]['id'] ?>">
                <input value="<?php echo $p[0]['name'] ?>" name="name" id="inputName" class="form-control">
              </div>
              <div class="form-group">
              <div class="form-group">
                <label for="inputName">Email</label>
                <input value="<?php echo $p[0]['email'] ?>" name="email"  id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Password</label>
                <input value="<?php echo $p[0]['password'] ?>" name="password" type="text" id="inputName" class="form-control">
              </div>    
              <div class="form-group">
                <label for="inputName">Id</label>
                <input value="<?php echo $p[0]['id'] ?>" name="id"  id="inputName" class="form-control">
              </div>                      
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
       
      </div>
      <div class="row">
        <div class="col-12">
          <a href="users.php" class="btn btn-secondary">Cancel</a>
          <input name="submit" type="submit" value="Xác nhận" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  endif; 
  ?>
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>