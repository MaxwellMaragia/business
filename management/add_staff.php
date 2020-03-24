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

    if(isset($_POST['submit'])){

        $name= $obj->con->real_escape_string(htmlspecialchars($_POST['name']));
        $id = $obj->con->real_escape_string(htmlspecialchars($_POST['id']));
        $role = $obj->con->real_escape_string(htmlspecialchars($_POST['role']));
        $password=md5($id);

        $insert = "SELECT job_id FROM users WHERE job_id='$id'";
        $r_insert = mysqli_query($obj->con,$insert);
        $exist=mysqli_num_rows($r_insert);

        if($exist!=0){
          $error="account already exists";
        }else{
          $add_user="INSERT INTO `users`(`name`,`username`, `job_id`,`role`,`password`) VALUES ('$name','$id','$id','$role','$password')";
          $r_add_user=mysqli_query($obj->con,$add_user);
          $success = "User added successfully";
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
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add staff</h1>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add staff</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg John Doe" value="" name="name" required="required">
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">job Id/national id</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" value="" name="id" required="required">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Role</label>
                                        <select class="form-control" name="role">
                                          <option value="1">Admin</option>
                                          <option value="2">Editor</option>
                                        </select>
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
</body>
</html>
