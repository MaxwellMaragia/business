<?php
session_start();
if(!$_SESSION['admin'])
{
    header('location:login');
}
else{

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
                    <section class="content">
                        <div class="error-page">
                            <h2 class="headline text-warning"> 404</h2>

                            <div class="error-content">
                                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                                <p>
                                    We could not find the page you were looking for.
                                    Meanwhile, you may <a href="index">return to dashboard</a> or try using the search form.
                                </p>

                                <form class="search-form">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.input-group -->
                                </form>
                            </div>
                            <!-- /.error-content -->
                        </div>
                        <!-- /.error-page -->
                    </section>
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
