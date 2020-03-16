<?php
session_start();
if($_SESSION['admin'])
{
    include 'functions/actions.php';
    $obj=new DataOperations();
    $document = '';

    //get author

    $where = array('username'=>$_SESSION['admin']);
    $get_author = $obj->fetch_records('users',$where);
    foreach($get_author as $row)
    {
        $aid = $row['id'];
        $role = $row['role'];
    }

    $id = intval($_GET['id']);

    $where = array('id'=>$id);
    $get_insight = $obj->fetch_records('news',$where);
    if($get_insight)
    {
        foreach($get_insight as $row)
        {
            $title = $row['heading'];
            $body = $row['body'];
            $media = $row['media_type'];
            $file = $row['media'];
            $date = $row['date'];
            $c_document = $row['file'];
            $aid = $row['author'];
            $cid = $row['category'];
            $state = $row['state'];

            //get category
            $where = array('id'=>$cid);
            $get_cat = $obj->fetch_records('categories',$where);
            foreach ($get_cat as $row)
            {
                $category_name = $row['name'];
            }

            //get author
            $where = array('id'=>$_SESSION['admin']);
            $get_user = $obj->fetch_records('users',$where);
            foreach ($get_user as $row)
            {
                
                $role = $row['role'];
               
            }


        }
    }
    else{
        header('location:404');
    }




    $error=$success='';



    if(isset($_POST['submit'])) {

        $category = $obj->con->real_escape_string(htmlentities($_POST['category']));
        $heading = $obj->con->real_escape_string(htmlentities($_POST['title']));
        $body = $obj->con->real_escape_string($_POST['body']);
        $keywords = strip_tags($body);

        if($role == 1){
            $state = intval($_POST['state']);
            
        }



        //get id which news will fall into
        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 1";
        $exe = mysqli_query($obj->con,$sql);

//        if(mysqli_num_rows($exe)>0)
//        {
//            while($getID = mysqli_fetch_assoc($exe))
//            {
//                $last_id = $getID['id'];
//                $news_id = $last_id+1;
//            }
//
//        }
//        else{
//            $news_id = 1;
//
//        }



        if(isset($_POST['media']))
        {
            $media_type = $_POST['media'];
        }
        else{
            $media_type = '';
        }

        //check if pdf uploaded
        if(is_uploaded_file($_FILES['pdf']['tmp_name']))
        {
            //save document to folder and database
            if($c_document)
            {
                unlink($c_document);
            }

            $pdfname    = uniqid() . "_" . time(); // 5dab1961e93a7_1571494241
            $extension  = pathinfo( $_FILES["pdf"]["name"], PATHINFO_EXTENSION ); // jpg,pdf
            $basename   = $pdfname . '.' . $extension; // 5dab1961e93a7_1571494241.pdf
            $source     = $_FILES["pdf"]["tmp_name"];
            $document   = "documents/blog/" . $basename;
            $c_document   = "documents/blog/" . $basename;
            move_uploaded_file( $source, $document );
        }


       


        if($media_type)
        {
            if($media_type == 'image')
            {
                if($_FILES['image_file']['tmp_name'])
                {

                    if($_FILES['image_file']['size'] > 5000000) { //5 MB (size is also in bytes)
                        $error = "image is too large. Maximum image file size is 5 mb";


                    } else if($_FILES['image_file']['size'] > 1) {

                        //save image to folder and database
                       
                        unlink($file);
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
                            'body'=>$body,
                            'keywords'=>$keywords,
                            'media_type'=>$media_type,
                            'media'=>$image,
                            'file'=>$c_document,
                            'state'=>$state
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
                        
                        unlink($file);
                        $filename   = uniqid() . "_" . time(); // 5dab1961e93a7_1571494241
                        $extension  = pathinfo( $_FILES["video_file"]["name"], PATHINFO_EXTENSION ); // jpg,pdf
                        $basename   = $filename . '.' . $extension; // 5dab1961e93a7_1571494241.jpg
                        $source       = $_FILES["video_file"]["tmp_name"];
                        $video = "videos/blog/" . $basename;
                        move_uploaded_file( $source, $video );

                        $data = array(
                            'category'=>$category,
                            'heading'=>$heading,
                            'body'=>$body,
                            'keywords'=>$keywords,
                            'media_type'=>$media_type,
                            'media'=>$video,
                            'file'=>$c_document,
                            'state'=>$state
                        );

                    }

                }
            }
        }
        else{
            $data = array(
                'category'=>$category,
                'heading'=>$heading,
                'body'=>$body,
                'keywords'=>$keywords,
                'file'=>$c_document,
                'state'=>$state

            );
        }

        $where = array('id'=>$id);

        if($obj->update_record('news',$where,$data))
        {
            $success = "Insight updated";
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="insights"><i class="fa fa-dashboard"></i> Insights/</a></li>
                <li class="active">edit insight</li>
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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Insight</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group col-md-6">
                                    <p>Fields marked with (<span class="text-danger">*</span>) are required</p>
                                        <label for="exampleInputEmail1">Category<span class="text-danger">*</span></label>
                                        <select name="category" required="required" class="form-control">
                                            <option value="<?=$cid?>"><?=$category_name?></option>
                                            <?php
                                            $sql = "SELECT * FROM categories WHERE id!=$cid";
                                            $exe = mysqli_query($obj->con,$sql);
                                            while($get_cat = mysqli_fetch_assoc($exe))
                                            {
                                                ?>
                                                <option value="<?= $get_cat['id']?>"><?=$get_cat['name']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="News title" name="title" required value="<?=$title?>">
                                    </div>

                                    <div class="form-group" style="margin-left:8px;">
                                        <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                        <textarea class="textarea" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="body" required="required">
                                                <?=$body?>
                                    </textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                    <?php
                                    
                                    if($c_document)
                                    {
                                        ?>
                                        <label>Current doc</label><br>
                                        <a href="<?=$c_document?>" target="_blank"><?=$c_document?></a><br>
                                        <?php
                                    }
                                    
                                    ?>
                                        <label for="exampleInputFile" style="margin-top:30px;">Upload new pdf document</label><br>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="pdf" accept="application/pdf">
                                                <label class="custom-file-label" for="exampleInputFile">Select document</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group" style="margin-left:8px;">
                                        <label for="exampleInputEmail1">Media</label>
                                        <br>
                                        <?php
                                        if($media == 'image')
                                        {
                                            ?>
                                            <img src="<?= $file ?>" alt="media" height="100px;" width="150px;">
                                            <?php
                                        }
                                        else if($media == 'video')
                                        {
                                            ?>
                                            <video width="150" height="100" controls>
                                                            <source src="<?=$file?>" type="video/mp4">
                                                            <source src="movie.ogg" type="video/ogg">
                                                            Your browser does not support the video tag.
                                                        </video>
                                            <?php
                                        }
                                        ?>
                                    </div>


                                    <label for="exampleInputEmail1" style="margin-left:7px;">Select new</label><br>
                                    <div class="form-group row">

                                        <div class="custom-control custom-radio" style="margin-left:13px;">
                                            <input class="custom-control-input" type="radio" id="customRadio1" name="media" value="image">
                                            <label for="customRadio1" class="custom-control-label">Image</label>
                                        </div>
                                        <div class="custom-control custom-radio" style="margin-left:13px;">
                                            <input class="custom-control-input" type="radio" id="customRadio2" name="media" value="video">
                                            <label for="customRadio2" class="custom-control-label">Video</label>
                                        </div>
                                    </div>

                                    <div class="step">
                                        <div class="image box">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile1" name="image_file">
                                                        <label class="custom-file-label" for="customFile1">Choose image</label>
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
                                                        <input type="file" class="custom-file-input" id="customFile2" name="video_file">
                                                        <label class="custom-file-label" for="customFile2">Choose video</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                    if($role == 1){
                                        ?>
                                        <div class="form-group  col-md-6">
                                        <label for="exampleInputEmail1">State</label>
                                        <select name="state" class="form-control">
                                        <?php
                                        if($state == 0)
                                        {
                                            echo "<option value='0'>Not approved</option>";
                                            echo "<option value='1'>Approved</option>";
                                        }
                                        else{
                                            echo "<option value='1'>Approved</option>";
                                            echo "<option value='0'>Not approved</option>";
                                        }
                                        ?>
                                        </select>
                                    </div>
                                        <?php
                                    }
                                    ?>

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
