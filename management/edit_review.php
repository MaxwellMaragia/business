
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
        $review = $obj->con->real_escape_string(htmlspecialchars($_POST['review']));
        $role = $obj->con->real_escape_string(htmlspecialchars($_POST['role']));

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
                $new_image = "images/reviews/" . $basename;
                move_uploaded_file( $source, $new_image );

                $data = array(

                    'name'=>$name,
                    'role'=>$role,
                    'review'=>$review,
                    'image'=>$new_image
                );

            }

        }
        else{
            $data = array(

                'name'=>$name,
                'role'=>$role,
                'review'=>$review
            );
        }


        $where = array('id'=>$id);

        if($obj->update_record('reviews',$where,$data))
        {
            $success = "Review updated successfully";
        }
        else{
            $error = mysqli_error($obj->con);
        }

    }

    $where = array('id'=>$id);
    $get_review = $obj->fetch_records('reviews',$where);
    if($get_review)
    {
        foreach($get_review as $row)
        {
            $u_name = $row['name'];
            $u_role = $row['role'];
            $u_review = $row['review'];

            $u_image = $row['image'];

        }
    }
    else{
        header('location:404');
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
                <li><a href="reviews"><i class="fa fa-dashboard"></i> Reviews/</a></li>
                <li class="active">Edit <?=$u_name?>'s review</li>
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
                                <h3 class="card-title">Edit Review</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <p>Fields marked with (<span class="text-danger">*</span>) are required</p>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Names <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Margaret Wambui" name="name" required="required" value="<?=$u_name?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Managing director Industrial bank of Kenya" name="role" required="required" value="<?=$u_role?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Review <span class="text-danger">*</span></label>
                                        <textarea name="review" rows="3" placeholder="enter review"
                                                  class="form-control" required="required">
                                            <?=$u_review?>
                                        </textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Avatar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" accept="image/*" >
                                                <input type="hidden" name="image_old" value="<?=$u_image?>">
                                                <label class="custom-file-label" for="exampleInputFile">Select new image</label>
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
