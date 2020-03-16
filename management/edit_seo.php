
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

        $author = $obj->con->real_escape_string(htmlspecialchars($_POST['author']));
        $description = $obj->con->real_escape_string(htmlspecialchars($_POST['description']));
        $keywords = $obj->con->real_escape_string(htmlspecialchars($_POST['keywords']));
       

      

        $where = array('id'=>$id);
        $data = array('author'=>$author,'description'=>$description,'keywords'=>$keywords);

        if($obj->update_record('seo',$where,$data))
        {
            $success = "Update was successful";
        }
        else{
            $error = mysqli_error($obj->con);
        }

    }

    $where = array('id'=>$id);
    $get_seo = $obj->fetch_records('seo',$where);
    if($get_seo)
    {
        foreach($get_seo as $row)
        {
            $page = $row['page'];
            $author = $row['author'];
            $keywords = $row['keywords'];
            $description = $row['description'];
        
        }
    }
    else{
        header('location:seo');
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
                <li><a href="seo"><i class="fa fa-dashboard"></i> SEO/</a></li>
                <li class="active"><?=$page?></li>
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
                                        <label for="exampleInputEmail1">Author<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="eg 5elements" name="author" required="required" value="<?=$author?>">
                                    </div>

                                

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description<span class="text-danger">*</span></label>
                                        <textarea name="description"  rows="3" cols="3"
                                                  class="form-control" required="required">
                                           <?=$description?>
                                        </textarea>

                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Keywords<span class="text-danger">*</span></label>
                                        <textarea name="keywords"  rows="3" cols="3"
                                                  class="form-control" required="required">
                                           <?=$keywords?>
                                        </textarea>

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
