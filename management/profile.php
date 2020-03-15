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
    $userName=$_SESSION['admin'];

    if(isset($_POST['submit'])){

        $oldPassword= $obj->con->real_escape_string(htmlspecialchars($_POST['oldPassword']));
        $newPassword= $obj->con->real_escape_string(htmlspecialchars($_POST['newPassword']));

        $check_pw="SELECT password FROM users WHERE username='$userName'";
        $r_check_pw = mysqli_query($obj->con,$check_pw);
        $d_check_pw=mysqli_fetch_array($r_check_pw);
        $old_password=$d_check_pw['password'];

        if(md5($oldPassword) == $old_password){
          $password=md5($newPassword);
          //saving data one by one
          $data1 = array('password'=>$password);
          $where1 = array('username'=>$userName);
          $obj->update_record('users',$where1,$data1);
          $success="password changed successfully";
        }else {
          $error="Wrong old password, try again";
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
                        <h1 class="m-0 text-dark">Edit profile</h1>
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
                                <h3 class="card-title">Change password</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">old password</label>
                                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" value="" name="oldPassword">
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">New password</label>
                                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" value="" name="newPassword">
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
