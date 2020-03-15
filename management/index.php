<?php
session_start();
if(!$_SESSION['admin'])
{
    header('location:login');
}
else{

  if($_SESSION['role']!=1)
    {
        header('location:500');
    }
    

    include_once 'functions/actions.php';
    $obj = new DataOperations();

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once 'includes/resources.php'?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include_once 'includes/navigation.php'?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once 'includes/sidebar.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                    <?php

                    $sql = "SELECT id FROM services";
                    $exe = mysqli_query($obj->con,$sql);
                    echo mysqli_num_rows($exe);
                    ?>
                </h3>

                <p>Services</p>
              </div>
              <div class="icon">
                <i class="fa fa-envelope"></i>
              </div>
              <a href="services" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                    <?php

                    $sql = "SELECT id FROM reviews";
                    $exe = mysqli_query($obj->con,$sql);
                    echo mysqli_num_rows($exe);
                    ?>
                </h3>

                <p>Customer reviews</p>
              </div>
              <div class="icon">
                <i class="fa fa-comment"></i>
              </div>
              <a href="reviews" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                    <?php

                    $sql = "SELECT id FROM news";
                    $exe = mysqli_query($obj->con,$sql);
                    echo mysqli_num_rows($exe);
                    ?>
                </h3>

                <p>Insights</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper"></i>
              </div>
              <a href="insights" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                    <?php

                    $sql = "SELECT id FROM careers";
                    $exe = mysqli_query($obj->con,$sql);
                    echo mysqli_num_rows($exe);
                    ?>
                </h3>

                <p>Careers</p>
              </div>
              <div class="icon">
                <i class="fa fa-briefcase"></i>
              </div>
              <a href="careers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "includes/footer.php";?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include_once 'includes/scripts.php'?>
</body>
</html>
