
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

        $b_text = $obj->con->real_escape_string(htmlspecialchars($_POST['banner_text']));
        $v_url = $obj->con->real_escape_string(htmlspecialchars($_POST['video_url']));



        //saving data one by one
        $data3 = array('value'=>$b_text);
        $where3 = array('name'=>'youtube_section_text');
        $obj->update_record('home',$where3,$data3);

        $data4 = array('value'=>$v_url);
        $where4 = array('name'=>'youtube_video_url');
        $obj->update_record('home',$where4,$data4);

        $success = "Data changed successfully";

        //check if file is uploaded
        if($_FILES['image']['tmp_name'])
        {

            if($_FILES['image']['size'] > 5000000) { //5 MB (size is also in bytes)
                $error = "image is too large. Maximum file size is 5 mb";


            } else if($_FILES['image']['size'] > 1) {

                //save image to folder and database
                unlink($_POST['c_image']);
                $filename   = uniqid() . "_" . time(); // 5dab1961e93a7_1571494241
                $extension  = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); // jpg,pdf
                $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg
                $source  = $_FILES["image"]["tmp_name"];
                $image = "images/" . $basename;
                move_uploaded_file( $source, $image );
                $data = array('value'=>$image);
                $where = array('name'=>'youtube_section_image');
                $obj->update_record('home',$where,$data);


            }

        }

    }



    $sql = "SELECT value FROM home WHERE name='youtube_section_image'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $banner_image = $get_data['value'];

    $sql = "SELECT value FROM home WHERE name='youtube_section_text'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $banner_heading = $get_data['value'];

    $sql = "SELECT value FROM home WHERE name='youtube_video_url'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $video_url = $get_data['value'];

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
                        <h1 class="m-0 text-dark">Banner/ intro section</h1>
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
                                <h3 class="card-title">Home/youtube preview editor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Banner text</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Tagline" value="<?=$banner_heading?>" name="banner_text">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Youtube video url</label>
                                        <input type="url" class="form-control" id="exampleInputPassword1" placeholder="Url from youtube" value="<?=$video_url?>" name="video_url">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Banner image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" accept="image/*">
                                                <input type="hidden" value=<?=$banner_image?> name="c_image">
                                                <label class="custom-file-label" for="exampleInputFile">Choose background image</label>
                                            </div>
                                            <div style="margin-top:20px;" class="input-group">
                                                <?php
                                                if($banner_image)
                                                {
                                                    ?>
                                                    <img src="<?= $banner_image ?>" alt="" height="100px" width="200px">
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <p class="text-danger">No Image uploaded yet</p>
                                                    <?php
                                                }
                                                ?>
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
