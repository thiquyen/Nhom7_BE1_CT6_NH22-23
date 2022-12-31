<?php include("header.php") ?>
<?php
require("../../../config.php");
require("../../../models/db.php");
require("../../../models/products.php");
require("../../../models/protypes.php");
require("../../../models/manufactures.php");
require("../../../models/user.php");

$User = new User;
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
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
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <!-- <h3 class="card-title">User</h3>
          <a class="btn btn-success btn-sm mx-3" href="user-add.php">
                              <i class="fas fa-plus">
                              </i>
                              Add
                          </a> -->

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
          <table class="table table-striped projects">
              <thead>
                  <tr>
                  <th style="width: 20%">
                          Email
                      </th>
                      <th style="width: 10%">
                          Username
                      </th>
                      <th style="width: 20%">
                          Password
                      </th>   
                      <th style="width: 20%">
                          Id
                      </th>                 
                      <th style="width: 2%">
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $getAllUser = $User->getAllUser();
               
                foreach($getAllUser as $value):
               
                ?>
                  <tr>  
                       <td><?php echo $value['email'] ?></td>                   
                      <td><?php echo $value['name'] ?></td>
                      <td><?php echo $value['password'] ?></td>
                      <td><?php echo $value['user_type'] ?></td>
                      <td class="project-actions text-right">

                          <a class="btn btn-info btn-sm" href="up-user.php?id= <?php echo $value['id'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Đổi mật khẩu
                          </a>
                          <a class="btn btn-danger btn-sm" href="deluser.php?id= <?php echo $value['id'] ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
