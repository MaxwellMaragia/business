
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



    if(isset($_POST['submit']))
    {
        $name=$obj->con->real_escape_string(htmlentities($_POST['name']));
        $description=$obj->con->real_escape_string($_POST['description']);
        $icon=$obj->con->real_escape_string(htmlentities($_POST['icon']));


        $where=array("heading"=>$name);
        if($obj->fetch_records("services",$where))
        {
            $error="Service with this name has already been registered";
        }
        else
        {
            $data=array(

                "heading"=>$name,
                "body"=>$description,
                "icon"=>$icon

            );

            if($obj->insert_record("services",$data))
            {
                $success="Service recorded successfully";

            }
            else
            {
                $error="Error in adding service";
                $error = mysqli_error($obj->con);
            }
        }

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
                <li class="active">Add service</li>
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
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Service" name="name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Icon<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="icon" name="icon" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description<span class="text-danger">*</span></label>
                                        <textarea class="textarea form-control" rows="3" placeholder="Enter ..." name="description" required="required"></textarea>

                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
