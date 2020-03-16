
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


    $sql = "SELECT value FROM home WHERE name='banner_heading'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $banner_heading = $get_data['value'];
    }

    $sql = "SELECT value FROM home WHERE name='home_top_banner'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $banner_type = $get_data['value'];
    }

    $sql = "SELECT value FROM home WHERE name='banner_text'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $banner_text = $get_data['value'];
    }

    $sql = "SELECT value FROM home WHERE name='banner_button_text'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $button_text = $get_data['value'];
    }

    $sql = "SELECT value FROM home WHERE name='banner_button_link'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $button_url = $get_data['value'];
    }

    $sql = "SELECT value FROM home WHERE name='video'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $video_url = $get_data['value'];


    if(isset($_POST['submit'])){

        $b_heading = $obj->con->real_escape_string(htmlspecialchars($_POST['banner_heading']));
        $b_text = $obj->con->real_escape_string(htmlspecialchars($_POST['banner_text']));
        $bu_text = $obj->con->real_escape_string(htmlspecialchars($_POST['button_text']));
        $b_url = $obj->con->real_escape_string(htmlspecialchars($_POST['button_url']));
        $banner_type = $obj->con->real_escape_string(htmlspecialchars($_POST['banner_type']));


        //saving data one by one
        $data1 = array('value'=>$b_heading);
        $where1 = array('name'=>'banner_heading');
        $obj->update_record('home',$where1,$data1);

        $data2 = array('value'=>$b_text);
        $where2 = array('name'=>'banner_text');
        $obj->update_record('home',$where2,$data2);

        $data3 = array('value'=>$bu_text);
        $where3 = array('name'=>'banner_button_text');
        $obj->update_record('home',$where3,$data3);

        $data4 = array('value'=>$b_url);
        $where4 = array('name'=>'banner_button_link');
        $obj->update_record('home',$where4,$data4);

        $data5 = array('value'=>$banner_type);
        $where5 = array('name'=>'home_top_banner');
        $obj->update_record('home',$where5,$data5);

        $success = "Data changed successfully";

        //check if file is uploaded
        if($_FILES['video']['tmp_name'])
        {

            if($_FILES['video']['size'] > 20000000) { //10 MB (size is also in bytes)
                $error = "Video is too large. Maximum file size is 20mb";


            } else if($_FILES['video']['size'] > 1) {


                //first delete old video file
                unlink($video_url);

                //save video to folder and database
                $filename   = uniqid() . "_" . time(); // 5dab1961e93a7_1571494241
                $extension  = pathinfo( $_FILES["video"]["name"], PATHINFO_EXTENSION ); // jpg,pdf
                $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg
                $source  = $_FILES["video"]["tmp_name"];
                $video = "videos/" . $basename;
                move_uploaded_file( $source, $video );
                $data = array('value'=>$video);
                $where = array('name'=>'video');
                $obj->update_record('home',$where,$data);


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
    <script src="functions/co_wordCount_dei.js" charset="utf-8"></script>

    <script type=”text/javascript” src=”//cdn.jsdelivr.net/afterglow/latest/afterglow.min.js”></script>
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
                        <h1 class="m-0 text-dark">Banner/intro section</h1>
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
                                <h3 class="card-title">Banner/Intro editor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Banner type</label>
                                      <select class="form-control" name="banner_type">
                                        <option><?php if($banner_type==1){echo 'banner with blue container(current)';}else{echo 'banner full screen(current)';} ?></option>
                                        <option value="1">banner with blue container</option>
                                        <option value="2">banner full screen</option>

                                      </select>
                                      <small id="wordAlert" class="float-right"></small>

                                  </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Banner heading</label>
                                        <input id="5-24" type="text" class="form-control co_form_dei" id="exampleInputEmail1" placeholder="eg Tagline" value="<?=$banner_heading?>" name="banner_heading">
                                        <small id="wordAlert" class="float-right"></small>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Banner text</label>
                                        <textarea id="5-147" class="form-control co_form_dei" rows="3" placeholder="Enter ..." name="banner_text"><?=$banner_text?></textarea>
                                        <small id="wordAlert" class="float-right"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Button text</label>
                                        <input id="5-100" type="text" class="form-control co_form_dei" id="exampleInputEmail1" placeholder="eg Tagline" value="<?=$button_text?>" name="button_text">
                                        <small id="wordAlert" class="float-right"></small>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Button url</label>
                                        <input id="5-100" type="url" class="form-control" id="exampleInputPassword1" placeholder="Banner text" value="<?=$button_url?>" name="button_url">

                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputFile">Video file input <small class="text-info">(!!Rename your file to relevant one word before uploading)</small></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="video" accept="video/*">
                                                <label class="custom-file-label" for="exampleInputFile">Choose video background</label>
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">
                                                <?php
                                                if($video_url)
                                                {
                                                    ?>
                                                    <video width="320" height="240" controls src="<?=$video_url?>">

                                                    </video>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <p class="text-danger">No video uploaded yet</p>
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
                        <img src="images/description/banner_heading.png" alt="banner" class="image-responsive">
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
