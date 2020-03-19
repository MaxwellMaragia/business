
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

    if(isset($_POST['submit'])){

        $name = $obj->con->real_escape_string(htmlspecialchars($_POST['name']));
        $description = $obj->con->real_escape_string(htmlspecialchars($_POST['description']));
        $role = $obj->con->real_escape_string(htmlspecialchars($_POST['role']));
        $facebook = $obj->con->real_escape_string(htmlspecialchars($_POST['facebook']));
        $twitter = $obj->con->real_escape_string(htmlspecialchars($_POST['twitter']));
        $linkedlin = $obj->con->real_escape_string(htmlspecialchars($_POST['linkedin']));
        $image = $_POST['image_old'];



        //check if file is uploaded
        if($_FILES['image']['tmp_name'])
        {

            if($_FILES['image']['size'] > 5000000) { //5 MB (size is also in bytes)
                $error = "image is too large. Maximum file size is 5 mb";


            } else if($_FILES['image']['size'] > 1) {


                //unlink previous image first
                unlink($image);
                //save image to folder and database
                $filename   = uniqid() . "_" . time(); // 5dab1961e93a7_1571494241
                $extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); // jpg,pdf
                $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg
                $source  = $_FILES["image"]["tmp_name"];
                $new_image = "images/team/" . $basename;
                move_uploaded_file( $source, $new_image );

                $data = array(

                    'name'=>$name,
                    'title'=>$role,
                    'description'=>$description,
                    'linkedin'=>$linkedlin,
                    'facebook'=>$facebook,
                    'twitter'=>$twitter,
                    'image'=>$new_image
                );

            }

        }
        else{
            $data = array(

                'name'=>$name,
                'title'=>$role,
                'description'=>$description,
                'linkedin'=>$linkedlin,
                'facebook'=>$facebook,
                'twitter'=>$twitter
            );
        }

        $where = array('id'=>$id);

        if($obj->update_record('team',$where,$data))
        {
            $success = "Team member updated successfully";
        }
        else{
            $error = mysqli_error($obj->con);
        }

    }

    $where = array('id'=>$id);
    $get_member = $obj->fetch_records('team',$where);
    if($get_member)
    {
        foreach($get_member as $row)
        {
            $u_name = $row['name'];
            $u_role = $row['title'];
            $u_description = $row['description'];
            $u_facebook = $row['facebook'];
            $u_twitter = $row['twitter'];
            $u_linkedlin = $row['linkedin'];
            $u_image = $row['image'];

        }
    }
    else{
        header('location:members');
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
                <li class="active">Edit <?=$u_name?></li>
            </ol>
        </section>
        <!-- /.content-header -->

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
                                <h3 class="card-title">Update data</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                    <p>Fields marked with (<span class="text-danger">*</span>) are required</p>
                                        <label for="exampleInputEmail1">Names<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Margaret Wambui" name="name" required="required" value="<?=$u_name?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Managing director" name="role" required="required" value="<?=$u_role?>">
                                        <input type="hidden" name="image" value="<?=$u_image?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Short description<span class="text-danger">*</span></label>
                                        <textarea name="description"  rows="3" cols="3"
                                                  class="form-control" required="required">
                                           <?=$u_description?>
                                        </textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook</label>
                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Facebook page url" name="facebook" value="<?=$u_facebook?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Twitter</label>
                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="Twitter page url" name="twitter" value="<?=$u_twitter?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">LinkedIn</label>
                                        <input type="url" class="form-control" id="exampleInputEmail1" placeholder="LinkedIn page url" name="linkedin" value="<?=$u_linkedlin?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputFile">New profile picture</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-inpu" id="exampleInputFile" name="image" accept="image/*" >
                                                <input type="hidden" name="image_old" value="<?=$u_image?>">
                                            </div>

                                            <div class="input-group" style="margin-top:10px;">
                                                <img src="<?= $u_image ?>" alt="<?= $u_name ?>" height="100px" width="100px" >
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
                        <img src="images/banner.png" alt="banner" class="image-responsive">
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
