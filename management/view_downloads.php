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

    if(isset($_POST['delete']))
    {
      $doc = $obj->con->real_escape_string(htmlspecialchars($_POST['doc']));
      $id = $obj->con->real_escape_string(htmlspecialchars($_POST['delete']));

      $deleted=unlink($doc);
      if($deleted){
        $sql="DELETE FROM Downloads WHERE id='$id'";
        $run=mysqli_query($obj->con,$sql);
      }
    }
}
?>
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
                        <h1 class="m-0 text-dark">Downloads</h1>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Files available for download by users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="add_downloads" class="btn btn-outline-info btn-md" style="margin-bottom:10px;">Add new</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Document</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $get_service = $obj->fetch_all_records('Downloads');
                                        foreach($get_service as $row)
                                        {

                                            ?>
                                            <tr>
                                                <td><?=$row['title']?></td>
                                                <td><a target="_blank" href="<?=$row['document']?>"><?=$row['document']?></a></td>
                                                <td>
                                                    <button type="submit" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#delete<?=$row['id']?>"><span class="fa fa-trash"></span></button>
                                                </td>
                                            </tr>

                                            <!--          delete modal-->
                                            <div class="modal fade" id="delete<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete prompt</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger">
                                                                Are you sure you want to delete this file?
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="" METHOD="post">
                                                                <input type="hidden" name="doc" value="<?=$row['document']?>">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button  class="btn btn-primary" type="submit" name="delete" value="<?=$row['id']?>">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- end delete modal-->
                                            <?php
                                        }
                                        ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
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
</body>
</html>
