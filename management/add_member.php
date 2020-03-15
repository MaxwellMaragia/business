
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

        $name = $obj->con->real_escape_string(htmlspecialchars($_POST['name']));
        $description = $obj->con->real_escape_string(htmlspecialchars($_POST['description']));
        $role = $obj->con->real_escape_string(htmlspecialchars($_POST['role']));
        $facebook = $obj->con->real_escape_string(htmlspecialchars($_POST['facebook']));
        $twitter = $obj->con->real_escape_string(htmlspecialchars($_POST['twitter']));
        $linkedlin = $obj->con->real_escape_string(htmlspecialchars($_POST['linkedin']));



        //check if file is uploaded
        if($_FILES['image']['tmp_name'])
        {

            if($_FILES['image']['size'] > 5000000) { //5 MB (size is also in bytes)
                $error = "image is too large. Maximum file size is 5 mb";


            } else if($_FILES['image']['size'] > 1) {

                //save image to folder and database
                $filename   = uniqid() . "_" . time(); // 5dab1961e93a7_1571494241
                $extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); // jpg,pdf
                $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg
                $source  = $_FILES["image"]["tmp_name"];
                $image = "images/team/" . $basename;
                move_uploaded_file( $source, $image );

                $data = array(

                    'name'=>$name,
                    'title'=>$role,
                    'description'=>$description,
                    'linkedin'=>$linkedlin,
                    'facebook'=>$facebook,
                    'twitter'=>$twitter,
                    'image'=>$image
                );

                if($obj->insert_record('team',$data))
                {
                    $success = "Team member added successfully";
                }
                else{
                    $error = mysqli_error($obj->con);
                }


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
                <li><a href="members"><i class="fa fa-dashboard"></i> Members/</a></li>
                <li class="active">Add member</li>
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
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add team</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                    <p>Fields marked with (<span class="text-danger">*</span>) are required</p>
                                        <label for="exampleInputEmail1">Names<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Margaret Wambui" name="name" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Managing director" name="role" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Short description<span class="text-danger">*</span></label>
                                        <textarea name="description" rows="3" placeholder="enter short description"
                                                  class="form-control" required="required">
                                        </textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook</label>
                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Facebook page url" name="facebook">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Twitter</label>
                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Twitter page url" name="twitter">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">LinkedIn</label>
                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="LinkedIn page url" name="linkedin">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputFile">Profile picture<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" accept="image/*" required="required">
                                                <label class="custom-file-label" for="exampleInputFile">Choose profile</label>
                                            </div>
                                        </div>
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
                        <!-- <img src="images/banner.png" alt="banner" class="image-responsive"> -->
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
