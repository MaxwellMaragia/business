<?php
session_start();
if(!$_SESSION['admin'])
{
    header('location:login');
}
else{

    include_once 'functions/actions.php';
    $obj = new DataOperations();
    $error = $success = '';

    if(isset($_POST['delete']))
    {
        $id=$obj->con->real_escape_string(htmlentities($_POST['delete']));
        $image = $_POST['image'];
        $where=array("id"=>$id);
        unlink($image);
        if($obj->delete_record("news",$where))
        {
            $success="Insight has been removed";
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
                                <h3 class="card-title">Insights</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="add_insight" class="btn btn-outline-info btn-md" style="margin-bottom:10px;">Add new</a>
                                <div class="table-responsive">

                                    <?php
                                    if($success)
                                    {
                                        $obj->successDisplay($success);
                                    }
                                    if($error)
                                    {
                                        $obj->errorDisplay($error);
                                    }
                                    ?>

                                    <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
                                        <thead>
                                        <tr>
                                            <th>Media</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>state</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql="SELECT * FROM news";
                                        $execute=mysqli_query($obj->con,$sql);
                                        while($row = mysqli_fetch_assoc($execute))
                                        {
                                          $state = $row['state'];
                                          if($state == 1)
                                          {
                                              $job = 'active';
                                          }
                                          if($state == 0)
                                          {
                                              $job = 'inactive';
                                          }
                                            ?>

                                            <tr>
                                                <td>
                                                    <?php
                                                    $media=$row['media_type'];
                                                    if($media == 'video')
                                                    {
                                                        ?>
                                                        <video width="150" height="100" controls>
                                                            <source src="<?=$row['media']?>" type="video/mp4">
                                                            <source src="movie.ogg" type="video/ogg">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <?php
                                                    }
                                                    else if($media == 'image')
                                                    {
                                                        ?>
                                                        <img src="<?= $row['media'] ?>" height="100px" width="200px" alt="">
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $cid = $row['category'];
                                                    $sql = "SELECT name FROM categories WHERE id=$cid";
                                                    $exe = mysqli_query($obj->con,$sql);
                                                    while($get_cat = mysqli_fetch_assoc($exe))
                                                    {
                                                        $category = $get_cat['name'];
                                                    }
                                                    echo $category;
                                                    ?>
                                                </td>
                                                <td><?=$row['heading']?></td>
                                                <td><?=$job?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete<?=$row['id']?>"><span class="fa fa-trash"></span></button>
                                                    <a href="update_insight?id=<?=$row['id']?>" class="btn btn-sm btn-outline-info"><span class="fa fa-edit"></span></a>
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
                                                                Are you sure you want to remove this news item?
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="" METHOD="POST">
                                                                <input type="hidden" name="image" value="<?=$row['media']?>">
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
