
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

    $id = intval($_GET['id']);
    echo $id;
    

    if(isset($_POST['update']))
    {
        
        $heading = $obj->con->real_escape_string($_POST['heading']);
        $icon = $obj->con->real_escape_string($_POST['icon']);
        $body = $obj->con->real_escape_string($_POST['body']);

        $where = array('id'=>$_GET['id']);
        $data = array('heading'=>$heading,'body'=>$body,'icon'=>$icon);

        if($obj->update_record('services',$where,$data))
        {
            $success = "Service updated successfully";
        }
        else{
            $error = "Error updating service";
        }

    }

    $where = array('id'=>$id);
    $get_service = $obj->fetch_records('services',$where);

    foreach($get_service as $row)
    {
        $e_heading = $row['heading'];
        $e_icon = $row['icon'];
        $e_body = $row['body'];
    }

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
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="services"><i class="fa fa-dashboard"></i> Services/</a></li>
                <li class="active">Edit service <?=$e_heading?></li>
            </ol>
        </section>
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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Banner/Intro editor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                    <p>Fields marked with (<span class="text-danger">*</span>) are required</p>
                                        <label for="exampleInputEmail1">Heading<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Service" name="heading" required="required" value="<?=$e_heading?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Icon<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="icon" name="icon" required="required" value="<?=$e_icon?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description<span class="text-danger">*</span></label>
                                        <textarea class="textarea form-control" rows="3" placeholder="Enter ..." name="body" required="required">
                                          <?=$e_body?>
                                        </textarea>

                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
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
