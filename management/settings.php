
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


    $sql = "SELECT value FROM general_settings WHERE name='logo'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $logo_url = $get_data['value'];

    $sql = "SELECT value FROM general_settings WHERE name='favicon'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $favicon_url = $get_data['value'];


    $sql = "SELECT value FROM general_settings WHERE name='facebook'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $facebook = $get_data['value'];


    $sql = "SELECT value FROM general_settings WHERE name='mobile1'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $mobile1 = $get_data['value'];


    $sql = "SELECT value FROM general_settings WHERE name='linkedin'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $linkedin = $get_data['value'];


    $sql = "SELECT value FROM general_settings WHERE name='mobile2'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $mobile2 = $get_data['value'];

    $sql = "SELECT value FROM general_settings WHERE name='email1'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $email1 = $get_data['value'];

    $sql = "SELECT value FROM general_settings WHERE name='email2'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $email2 = $get_data['value'];

    $sql = "SELECT value FROM general_settings WHERE name='address'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $address = $get_data['value'];

    $sql = "SELECT value FROM general_settings WHERE name='map'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $map = $get_data['value'];

    $sql = "SELECT value FROM general_settings WHERE name='footer_text'";
    $exe = mysqli_query($obj->con,$sql);
    $get_data = mysqli_fetch_assoc($exe);
    $ft = $get_data['value'];



    if(isset($_POST['submit'])){

        $mobile1 = $obj->con->real_escape_string(htmlspecialchars($_POST['mobile1']));
        $mobile2 = $obj->con->real_escape_string(htmlspecialchars($_POST['mobile2']));
        $email1 = $obj->con->real_escape_string(htmlspecialchars($_POST['email1']));
        $email2 = $obj->con->real_escape_string(htmlspecialchars($_POST['email2']));
        $address = $obj->con->real_escape_string(htmlspecialchars($_POST['address']));
        $map = $obj->con->real_escape_string(htmlspecialchars($_POST['map']));
        $facebook = $obj->con->real_escape_string(htmlspecialchars($_POST['facebook']));
        $linkedin = $obj->con->real_escape_string(htmlspecialchars($_POST['linkedin']));
        $footer_text = $obj->con->real_escape_string(htmlspecialchars($_POST['footer_text']));





        //saving data one by one
        $data = array('value'=>$footer_text);
        $where = array('name'=>'footer_text');
        $obj->update_record('general_settings',$where,$data);

        $data = array('value'=>$mobile1);
        $where = array('name'=>'mobile1');
        $obj->update_record('general_settings',$where,$data);

        $data = array('value'=>$mobile2);
        $where = array('name'=>'mobile2');
        $obj->update_record('general_settings',$where,$data);

        $data = array('value'=>$facebook);
        $where = array('name'=>'facebook');
        $obj->update_record('general_settings',$where,$data);

        $data = array('value'=>$linkedin);
        $where = array('name'=>'linkedin');
        $obj->update_record('general_settings',$where,$data);

        $data = array('value'=>$email1);
        $where = array('name'=>'email1');
        $obj->update_record('general_settings',$where,$data);

        $data = array('value'=>$email2);
        $where = array('name'=>'email2');
        $obj->update_record('general_settings',$where,$data);

        $data = array('value'=>$address);
        $where = array('name'=>'address');
        $obj->update_record('general_settings',$where,$data);

        $data = array('value'=>$map);
        $where = array('name'=>'map');
        $obj->update_record('general_settings',$where,$data);

        $success = "Data changed successfully";

        //check if logo file is uploaded
        if($_FILES['logo']['tmp_name'])
        {

            if($_FILES['logo']['size'] > 10000000) { //10 MB (size is also in bytes)
                $error = "Logo is too large. Maximum file size is 10mb";


            } else if($_FILES['logo']['size'] > 1) {


                //first delete old video file
                unlink($logo_url);

                //save video to folder and database
                $logo = "images/".$_FILES['logo']['name'];
                move_uploaded_file($_FILES['logo']['tmp_name'],$logo);
                $data = array('value'=>$logo);
                $where = array('name'=>'logo');
                $obj->update_record('general_settings',$where,$data);


            }

        }

        //check if favicon file is uploaded
        if($_FILES['favicon']['tmp_name'])
        {

            if($_FILES['favicon']['size'] > 10000000) { //10 MB (size is also in bytes)
                $error = "Favicon is too large. Maximum file size is 10mb";


            } else if($_FILES['favicon']['size'] > 1) {


                //first delete old favicon file
                unlink($favicon_url);

                //save favicon to folder and database
                $favicon = "images/".$_FILES['favicon']['name'];
                move_uploaded_file($_FILES['favicon']['tmp_name'],$favicon);
                $data = array('value'=>$favicon);
                $where = array('name'=>'favicon');
                $obj->update_record('general_settings',$where,$data);


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
                        <h1 class="m-0 text-dark">General settings</h1>
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
                                <h3 class="card-title">General settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mobile one</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  value="<?=$mobile1?>" name="mobile1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mobile two</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"  value="<?=$mobile2?>" name="mobile2">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email one</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"  value="<?=$email1?>" name="email1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email two</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"  value="<?=$email2?>" name="email2">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook page address</label>
                                        <input type="url" class="form-control" id="exampleInputEmail1"  value="<?=$facebook?>" name="facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Linkedin page address</label>
                                        <input type="url" class="form-control" id="exampleInputEmail1"  value="<?=$linkedin?>" name="linkedin">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="address"><?=$address?></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Footer text</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="footer_text"><?=$ft?></textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Map</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="map"><?=$map?></textarea>

                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputFile">Logo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-inpu" id="exampleInputFile" name="logo" accept="image/*">
                                                <!-- <label class="custom-file-label" for="exampleInputFile">Choose logo</label> -->
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">
                                                <?php
                                                if($logo_url)
                                                {
                                                    ?>
                                                    <img src="<?= $logo_url ?>" alt="logo" height="50px" width="100px">
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <p class="text-danger">No logo uploaded yet</p>
                                                    <?php
                                                }
                                                ?>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Fav icon</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-inpu" id="exampleInputFile" name="favicon" accept="image/*">
                                                <!-- <label class="custom-file-label" for="exampleInputFile">Choose favicon</label> -->
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">
                                                <?php
                                                if($favicon_url)
                                                {
                                                    ?>
                                                    <img src="<?= $favicon_url ?>" alt="logo" style="height:50px;width:50px;">
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <p class="text-danger">No favicon uploaded yet</p>
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
