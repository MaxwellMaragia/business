
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

        $as_title = $obj->con->real_escape_string(htmlspecialchars($_POST['title']));
        $as_text = $obj->con->real_escape_string(htmlspecialchars($_POST['text']));
        $bu_text = $obj->con->real_escape_string(htmlspecialchars($_POST['button_text']));


        //saving data one by one
        $data1 = array('value'=>$as_title);
        $where1 = array('name'=>'about_header_title');
        $obj->update_record('about',$where1,$data1);

        $data2 = array('value'=>$as_text);
        $where2 = array('name'=>'about_header_text');
        $obj->update_record('about',$where2,$data2);

        // $data3 = array('value'=>$bu_text);
        // $where3 = array('name'=>'banner_button_text');
        // $obj->update_record('home',$where3,$data3);

        $data4 = array('value'=>$bu_text);
        $where4 = array('name'=>'about_header_button_text');
        $obj->update_record('about',$where4,$data4);

        $success = "Data changed successfully";

        if($_FILES['document']['tmp_name'])
        {

            if($_FILES['document']['size'] > 5000000) { //5 MB (size is also in bytes)
                $error = "document is too large. Maximum file size is 5 mb";


            } else if($_FILES['document']['size'] > 1) {

                //save document to folder and database
                $document = "documents/".$_FILES['document']['name'];

                $originalFileName=$_FILES['document']['name'];
                $originalFileName_array=explode('.',$originalFileName);
                $ext=$originalFileName_array[1];
                $document="documents/".uniqid().'.'.$ext;

                move_uploaded_file($_FILES['document']['tmp_name'],$document);
                $where5 = array('name'=>'about_section_button_link');

                $current_file = "SELECT value FROM about WHERE name='about_header_button_link'";
                $r_current_file = mysqli_query($connect,$current_file);
                $d_current_file=mysqli_fetch_array($r_current_file);
                $d_current_file['value'];
                unlink($d_current_file['value']);


                $query="UPDATE `about` SET `value`='$document' WHERE `name`='about_header_button_link'";
                $run=mysqli_query($connect,$query);
            }

        }

        if($_FILES['image']['tmp_name'])
        {

            if($_FILES['image']['size'] > 5000000) { //5 MB (size is also in bytes)
                $error = "document is too large. Maximum file size is 5 mb";


            } else if($_FILES['image']['size'] > 1) {

                //save document to folder and database
                $image = "images/".$_FILES['image']['name'];

                $originalFileName=$_FILES['image']['name'];
                $originalFileName_array=explode('.',$originalFileName);
                $ext=$originalFileName_array[1];
                $image="images/".uniqid().'.'.$ext;

                move_uploaded_file($_FILES['image']['tmp_name'],$image);
                $where5 = array('name'=>'about_section_button_link');

                $current_file = "SELECT value FROM about WHERE name='about_header_image'";
                $r_current_file = mysqli_query($connect,$current_file);
                $d_current_file=mysqli_fetch_array($r_current_file);
                $d_current_file['value'];
                // unlink($d_current_file['value']);


                $query="UPDATE `about` SET `value`='$image' WHERE `name`='about_header_image'";
                $run=mysqli_query($connect,$query);
            }

        }


    }

    $sql = "SELECT value FROM about WHERE name='about_header_title'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $title = $get_data['value'];
    }

    $sql = "SELECT value FROM about WHERE name='about_header_text'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $text = $get_data['value'];
    }

    $sql = "SELECT value FROM about WHERE name='about_header_button_text'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $button_text = $get_data['value'];
    }
    $sql = "SELECT value FROM about WHERE name='about_header_button_link'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $button_link = $get_data['value'];
        $current_file=explode('/',$button_link);
        $current_file=$current_file[1];
    }

    $sql = "SELECT value FROM about WHERE name='about_header_image'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $about_header_image = $get_data['value'];
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
                        <h1 class="m-0 text-dark">About-header editor</h1>
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
                                <h3 class="card-title">About header</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">About_header title</label>
                                        <input type="text" class="form-control co_form_dei" id="10-50" placeholder="eg Tagline" value="<?=$title?>" name="title">
                                        <small id="wordAlert" class="float-right"></small>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">About_header text</label>
                                        <textarea class="form-control co_form_dei" rows="3" id="10-884" placeholder="Enter ..." name="text"><?=$text?></textarea>
                                        <small id="wordAlert" class="float-right"></small>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">About_header image</label><br>
                                        <img src="<?= $about_header_image ?>" alt="" height="100px" width="200px"><br><br>
                                        <label for="exampleInputEmail1">Upload header image</label><br>

                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" accept="application/pdf">
                                                <label class="custom-file-label" for="exampleInputFile">Upload new header image</label>
                                            </div>
                                        </div>                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Header button label</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg Tagline" value="<?=$button_text?>" name="button_text">
                                    </div>

                                    <div class="form-group  col-md-12">
                                        <label for="exampleInputFile">Header downloadable file</label>
                                        <a href="documents/<?=$current_file?>"> View current file</a>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="document" accept="image/*">
                                                <label class="custom-file-label" for="exampleInputFile">Upload new file</label>
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
                        <img src="images/description/about_section.png" alt="banner" class="image-responsive">
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
