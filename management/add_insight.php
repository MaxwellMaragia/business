<?php
session_start();
if($_SESSION['admin'])
{
    include 'functions/actions.php';
    $obj=new DataOperations();


    //get author

    $where = array('username'=>$_SESSION['admin']);
    $get_author = $obj->fetch_records('users',$where);
    foreach($get_author as $row)
    {
        $aid = $row['id'];
        $role = $row['role'];

        if($role>1)
        {
            $state = 0;
        }
        else{
            $state = 1;
        }
    }



    $error=$success=$category=$heading=$body=$document='';
    $date = date("d-M-Y");


    if(isset($_POST['submit'])) {

        $category = $obj->con->real_escape_string(htmlentities($_POST['category']));
        $heading = $obj->con->real_escape_string(htmlentities($_POST['title']));
        $body = $obj->con->real_escape_string($_POST['body']);
        $keywords = strip_tags($body);


        //get id which news will fall into
        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 1";
        $exe = mysqli_query($obj->con,$sql);

        if(mysqli_num_rows($exe)>0)
        {
            while($getID = mysqli_fetch_assoc($exe))
            {
                $last_id = $getID['id'];
                $news_id = $last_id+1;
            }

        }
        else{
            $news_id = 1;

        }

        $media_type = $_POST['media'];

        //check if pdf uploaded
        if(is_uploaded_file($_FILES['pdf']['tmp_name']))
        {
            //save image to folder and database
            $pdfname    = uniqid() . "_" . time(); // 5dab1961e93a7_1571494241
            $extension  = pathinfo( $_FILES["pdf"]["name"], PATHINFO_EXTENSION ); // jpg,pdf
            $basename   = $pdfname . '.' . $extension; // 5dab1961e93a7_1571494241.pdf
            $source     = $_FILES["pdf"]["tmp_name"];
            $document   = "documents/blog/" . $basename;
            move_uploaded_file( $source, $document );
        }



        if($media_type == 'image')
        {
            if($_FILES['image_file']['tmp_name'])
            {

                if($_FILES['image_file']['size'] > 5000000) { //5 MB (size is also in bytes)
                    $error = "image is too large. Maximum image file size is 5 mb";


                } else if($_FILES['image_file']['size'] > 1) {

                    //save image to folder and database
                    //rename file before uploading
                $filename   = uniqid() . "_" . time(); // 5dab1961e93a7_1571494241
                $extension  = pathinfo( $_FILES["image_file"]["name"], PATHINFO_EXTENSION ); // jpg,pdf
                $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg
                $source       = $_FILES["image_file"]["tmp_name"];
                $image = "images/blog/" . $basename;

                /* move the file */
                move_uploaded_file( $source, $image );
                    $data = array(
                        'category'=>$category,
                        'heading'=>$heading,
                        'body'=>"$body",
                        'keywords'=>$keywords,
                        'media_type'=>$media_type,
                        'author'=>$aid,
                        'date'=>$date,
                        'file'=>$document,
                        'state'=>$state,
                        'media'=>$image
                    );

                }

            }



        }
        if($media_type == 'video')
        {
            if($_FILES['video_file']['tmp_name'])
            {

                if($_FILES['video_file']['size'] > 20000000) { //20 MB (size is also in bytes)
                    $error = "Video is too large. Maximum image file size is 20 mb";


                } else if($_FILES['video_file']['size'] > 1) {

                    //save image to folder and database
                    $filename   = uniqid() . "_" . time(); // 5dab1961e93a7_1571494241
                    $extension  = pathinfo( $_FILES["video_file"]["name"], PATHINFO_EXTENSION ); // jpg,pdf
                    $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg
                    $source       = $_FILES["video_file"]["tmp_name"];
                    $video = "videos/blog/" . $basename;
                    move_uploaded_file( $source, $video );

                    $data = array(
                        'category'=>$category,
                        'heading'=>$heading,
                        'body'=>"$body",
                        'keywords'=>$keywords,
                        'media_type'=>$media_type,
                        'file'=>$document,
                        'author'=>$aid,
                        'date'=>$date,
                        'state'=>$state,
                        'media'=>$video
                    );

                }

            }
        }

        if($media_type == 'link')
        {
            $url = $obj->con->real_escape_string(htmlentities($_POST['link']));
            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
            $video_id = $matches[1];
            $data = array(
                'category'=>$category,
                'heading'=>$heading,
                'body'=>"$body",
                'keywords'=>$keywords,
                'media_type'=>$media_type,
                'file'=>$document,
                'author'=>$aid,
                'date'=>$date,
                'state'=>$state,
                'media'=>$video_id
            );
        }


        if($obj->insert_record('news',$data))
        {


            $success = "Insight added";

            $heading=$body='';
        }
        else{
            $error = "An error occured while saving data. Maybe you failed to upload a media or other error";
            $error = mysqli_error($obj->con);
        }

    }
}
else
{
    header('location:login');
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once 'includes/resources.php'?>
    <style>
        .box{display:none;}
    </style>
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
                <li><a href="insights"><i class="fa fa-dashboard"></i> Insights/</a></li>
                <li class="active">Add insight</li>
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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Insight</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group col-md-6">
                                    <p>Fields marked with (<span class="text-danger">*</span>) are required</p>
                                        <label for="exampleInputEmail1">Category<span class="text-danger">*</span></label>
                                        <select name="category" required="required" class="form-control">
                                            <option value="">Select category</option>
                                            <?php
                                            $get_cat = $obj->fetch_all_records('categories');
                                            foreach($get_cat as $row)
                                            {
                                                ?>
                                                <option value="<?= $row['id']?>"><?=$row['name']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="News title" name="title" required value="<?=$heading?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                        <textarea class="textarea" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="body" required="required">
                                        <?=$body?>
                                    </textarea>
                                    <a href="../web-builder/buttons" target="_blank">Design templates you can use</a>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputFile">Upload pdf document</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-inpu" id="exampleInputFile" name="pdf" accept="application/pdf">
                                                <!-- <label class="custom-file-label" for="exampleInputFile">Select document</label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                            <label for="exampleInputEmail1" style="margin-left:7px;">Media type<span class="text-danger">*</span></label><br>
                                    </div>
                                    <div class="form-group row col-md-6">

                                        <div class="custom-control custom-radio" style="margin-left:13px;">
                                            <input class="custom-control-input" type="radio" id="customRadio1" name="media" value="image" required>
                                            <label for="customRadio1" class="custom-control-label">Image</label>
                                        </div>
                                        <div class="custom-control custom-radio" style="margin-left:13px;">
                                            <input class="custom-control-input" type="radio" id="customRadio2" name="media" value="video">
                                            <label for="customRadio2" class="custom-control-label">Video</label>
                                        </div>
                                        <div class="custom-control custom-radio" style="margin-left:13px;">
                                            <input class="custom-control-input" type="radio" id="customRadio3" name="media" value="link">
                                            <label for="customRadio3" class="custom-control-label">Video link</label>
                                        </div>
                                    </div>

                                    <div class="step">
                                        <div class="image box">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-inpu" id="customFile1" name="image_file" accept="image/*">
                                                        <!-- <label class="custom-file-label" for="customFile1">Choose image</label> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="step">
                                        <div class="video box">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-inpu" id="customFile2" name="video_file" accept="video/*">
                                                        <!-- <label class="custom-file-label" for="customFile2">Choose video</label> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="step">
                                        <div class="link box">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">

                                                 <input type="url" class="form-control" id="customFile3" placeholder="format https://www.youtube.com/embed/XXbExVwuLAs" name="link">
                                                </div>
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
<script>
    $(document).ready(function(){
        $('input[type="radio"]').click(function(){
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>

</body>
</html>
