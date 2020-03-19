
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
        $ceo_name = $obj->con->real_escape_string(htmlspecialchars($_POST['name']));
        $ceo_title = $obj->con->real_escape_string(htmlspecialchars($_POST['title']));
        $ceo_text = $obj->con->real_escape_string(htmlspecialchars($_POST['text']));


        //saving data one by one
        $data1 = array('value'=>$ceo_name);
        $where1 = array('name'=>'ceo_name');
        $obj->update_record('about',$where1,$data1);

        $data1 = array('value'=>$ceo_title);
        $where1 = array('name'=>'ceo_section_title');
        $obj->update_record('about',$where1,$data1);

        $data2 = array('value'=>$ceo_text);
        $where2 = array('name'=>'ceo_section_text');
        $obj->update_record('about',$where2,$data2);

        $success = "Data changed successfully";

        if($_FILES['image']['tmp_name'])
        {

            if($_FILES['image']['size'] > 5000000) { //5 MB (size is also in bytes)
                $error = "document is too large. Maximum file size is 5 mb";


            } else if($_FILES['image']['size'] > 1) {

                //save document to folder and database
                $document = "images/".$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],$document);
                $where5 = array('name'=>'ceo_section_image');

                $current_file = "SELECT value FROM about WHERE name='ceo_section_image'";
                $r_current_file = mysqli_query($connect,$current_file);
                $d_current_file=mysqli_fetch_array($r_current_file);
                $d_current_file['value'];
                unlink($d_current_file['value']);


                $query="UPDATE `about` SET `value`='$document' WHERE `name`='ceo_section_image'";
                $run=mysqli_query($connect,$query);
            }

        }


    }

    $sql = "SELECT value FROM about WHERE name='ceo_name'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $name = $get_data['value'];
    }

    $sql = "SELECT value FROM about WHERE name='ceo_section_title'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $title = $get_data['value'];
    }

    $sql = "SELECT value FROM about WHERE name='ceo_section_text'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $text = $get_data['value'];
    }


    $sql = "SELECT value FROM about WHERE name='ceo_section_image'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $ceo_image = $get_data['value'];
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
                        <h1 class="m-0 text-dark">CEO section editor</h1>
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
                                <h3 class="card-title">CEO section</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CEO's name</label>
                                        <input  type="text" class="form-control co_form_dei" id="10-100"  value="<?=$name?>" name="name">
                                        <small id="wordAlert" class="float-right"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">CEO section title</label>
                                        <input type="text" class="form-control co_form_dei" id="10-85"  value="<?=$title?>" name="title">
                                        <small id="wordAlert" class="float-right"></small>


                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CEO section text</label>
                                        <input type="text" class="form-control co_form_dei" id="10-250"  value="<?=$text?>" name="text">
                                        <small id="wordAlert" class="float-right"></small>

                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label for="exampleInputFile">CEO's image upload</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="" name="image" accept="image/*">
                                                <label class="custom-file-label" for="exampleInputFile">CEO's image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:20px;" class="input-group">
                                        <?php
                                        if($ceo_image)
                                        {
                                            ?>
                                            <img src="<?= $ceo_image ?>" alt="" height="100px" width="200px">
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
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <img src="images/description/ceo_section.png" alt="banner" class="image-responsive">
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
