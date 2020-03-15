
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

        $bs_title = $obj->con->real_escape_string(htmlspecialchars($_POST['title']));
        $bs_text = $obj->con->real_escape_string(htmlspecialchars($_POST['text']));
        $bs_button_text = $obj->con->real_escape_string(htmlspecialchars($_POST['button_text']));
        $bs_button_url = $obj->con->real_escape_string(htmlspecialchars($_POST['button_url']));


        //saving data one by one
        $data1 = array('value'=>$bs_title);
        $where1 = array('name'=>'blue_section_title');
        $obj->update_record('about',$where1,$data1);

        $data2 = array('value'=>$bs_text);
        $where2 = array('name'=>'blue_section_text');
        $obj->update_record('about',$where2,$data2);

        $data3 = array('value'=>$bs_button_text);
        $where3 = array('name'=>'blue_section_button_text');
        $obj->update_record('about',$where3,$data3);

        $data4 = array('value'=>$bs_button_url);
        $where4 = array('name'=>'blue_section_button_url');
        $obj->update_record('about',$where4,$data4);

        $success = "Data changed successfully";

        if($_FILES['image']['tmp_name'])
        {

            if($_FILES['image']['size'] > 5000000) { //5 MB (size is also in bytes)
                $error = "Image is too large. Maximum file size is 5 mb";


            } else if($_FILES['image']['size'] > 1) {

                //save document to folder and database
                $image = "images/".$_FILES['image']['name'];

                $originalFileName=$_FILES['image']['name'];
                $originalFileName_array=explode('.',$originalFileName);
                $ext=$originalFileName_array[1];
                $image="images/".uniqid().'.'.$ext;

                move_uploaded_file($_FILES['image']['tmp_name'],$image);
                $where5 = array('name'=>'blue_section_image');

                $current_file = "SELECT value FROM about WHERE name='blue_section_image'";
                $r_current_file = mysqli_query($connect,$current_file);
                $d_current_file=mysqli_fetch_array($r_current_file);
                $d_current_file['value'];
                unlink($d_current_file['value']);


                $query="UPDATE `about` SET `value`='$image' WHERE `name`='blue_section_image'";
                $run=mysqli_query($connect,$query);
            }

        }


    }

    $sql = "SELECT value FROM about WHERE name='blue_section_title'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $title = $get_data['value'];
    }

    $sql = "SELECT value FROM about WHERE name='blue_section_text'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $text = $get_data['value'];
    }

    $sql = "SELECT value FROM about WHERE name='blue_section_button_text'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $button_text = $get_data['value'];
    }

    $sql = "SELECT value FROM about WHERE name='blue_section_button_url'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $button_url = $get_data['value'];
    }

    $sql = "SELECT value FROM about WHERE name='blue_section_image'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $bs_image = $get_data['value'];
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
                        <h1 class="m-0 text-dark">Blue section editor</h1>
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
                                <h3 class="card-title">Blue section</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blue section title</label>
                                        <input type="text" class="form-control co_form_dei" id="5-20" placeholder="eg Tagline" value="<?=$title?>" name="title">
                                        <small id="wordAlert" class="float-right"></small>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Blue section text</label>
                                        <textarea id="6-180" class="form-control co_form_dei" rows="3" placeholder="Enter ..." name="text"><?=$text?></textarea>
                                        <small id="wordAlert" class="float-right"></small>


                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blue section button text</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Tagline" value="<?=$button_text?>" name="button_text">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blue section button url</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Tagline" value="<?=$button_url?>" name="button_url">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="exampleInputFile">Blue section image</label>
                                        <img src="<?= $bs_image ?>" alt="" height="100px" width="200px"><br><br>

                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" accept="image/*">
                                                <label class="custom-file-label" for="exampleInputFile">Blue section image</label>
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
                        <img src="images/description/blue_section.png" alt="banner" class="image-responsive">
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
