
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
    $error = $success = '';

    if(isset($_POST['delete'])){

        echo $acc_id= $obj->con->real_escape_string(htmlspecialchars($_POST['delete']));

        $delete = "DELETE FROM users WHERE id='$acc_id'";
        $r_delete = mysqli_query($obj->con,$delete);

        if($r_delete){
          $success = "User account deleted successfully";
          }else{
          $error="Error";
        }
    }

    $sql = "SELECT * FROM users";
    $exe = mysqli_query($obj->con,$sql);

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
                        <h1 class="m-0 text-dark">Staff list</h1>
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
                    <div class="col-md-12">
                        <?php

                        if($error)
                        {
                            $obj->errorDisplay($error);
                        }
                        if($success)
                        {
                            $obj->successDisplay($success);
                        }

                        ?>

                    </div>
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card">
              <!-- <div class="card-header border-0">
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div> -->
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Job id</th>
                    <th>role</th>
                    <th>Delete<br> account</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($get_data = mysqli_fetch_assoc($exe)): ?>
                  <tr>
                    <td>
                      <?=$get_data['name']?>
                    </td>
                    <td>
                      <?=$get_data['username']?>
                    </td>
                    <td>
                      <?=$get_data['job_id']?>
                    </td>
                    <td>
                      <?php $role=$get_data['role']; if($role==1){echo 'Admin';}else{echo 'Editor';}?>
                    </td>
                    <td>
                      <form method="post" action="#">
                        <button type="submit" value="<?=$get_data['id']?>" name="delete"><span class="fa fa-trash"></span></button>
                      </form>
                    </td>
                  </tr>
                <?php endwhile; ?>

                  </tbody>
                </table>
              </div>
            </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                    </div>

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
<!--DataTable-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js "></script>
<script type="text/javascript" src=" https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js "></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

<!--/DataTable-->

</body>
</html>
