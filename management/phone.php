
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


    $sql = "SELECT value FROM home WHERE name='phone_banner'";
    $exe = mysqli_query($obj->con,$sql);
    while($get_data = mysqli_fetch_assoc($exe))
    {
        $banner_phone_image = $get_data['value'];
    }




    if(isset($_POST['submit'])){
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

              $move=move_uploaded_file($_FILES['image']['tmp_name'],$image);
              // $where5 = array('name'=>'about_section_button_link');
              if($move){
                unlink($banner_phone_image);
                $query="UPDATE `home` SET `value`='$image' WHERE `name`='phone_banner'";
                $run=mysqli_query($connect,$query);
                if($run){
                  $success = "image changed successfully";
                }
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
                        <h1 class="m-0 text-dark">Banner/intro section(mobile)</h1>
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
                                        <label for="exampleInputFile">Image file input <small class="text-info">()</small></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-inpu" id="exampleInputFile" name="image" accept="images/*">
                                                <!-- <label class="custom-file-label" for="exampleInputFile">Choose video background</label> -->
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">
                                              <img src="<?=$banner_phone_image?>" alt="" height="100px" width="200px"><br><br>

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
