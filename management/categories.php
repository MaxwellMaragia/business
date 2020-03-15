<?php
session_start();
if($_SESSION['admin'])
{

    $_SESSION['expire']=time();
    include 'functions/actions.php';
    $obj=new DataOperations();

    $error=$success='';

    if(isset($_POST['submit']))
    {
        $name=$obj->con->real_escape_string(htmlentities($_POST['name']));


        $where=array("name"=>$name);
        if($obj->fetch_records("categories",$where))
        {
            $error="Category with this name has already been registered";
        }
        else
        {
            $data=array(

                "name"=>$name

            );

            if($obj->insert_record("categories",$data))
            {
                $success="Category recorded successfully";

            }
            else
            {
                $error="Error in adding category";
            }
        }

    }

    if(isset($_POST['delete']))
    {
        $id=$obj->con->real_escape_string(htmlentities($_POST['delete']));
        $where=array("id"=>$id);
        if($obj->delete_record("categories",$where))
        {
            $success="Category has been removed";
        }
    }

}
else
{
    header('location:login');
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
                                <h3 class="card-title">Categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
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
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add" style="margin-bottom:20px;"><span class="fa fa-plus"></span>Add new</button>
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql="SELECT * FROM categories";
                                        $execute=mysqli_query($obj->con,$sql);
                                        while($row = mysqli_fetch_assoc($execute))
                                        {
                                            ?>

                                            <tr>
                                                <td><?=$row['name']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete<?=$row['id']?>"><span class="fa fa-trash"></span></button>
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
                                                                Are you sure you want to remove this category?
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" METHOD="POST">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button  class="btn btn-primary" type="submit" name="delete" value="<?=$row['id']?>">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--              end delete modal-->

                                            <?php
                                        }

                                        ?>
                                        </tbody>
                                    </table>
                                    <!--                                add modal-->
                                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" METHOD="POST">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name" placeholder="eg Events" required="required" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--                                end add modal-->




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
