<?php
session_start();
if(isset($_SESSION['service'])){
  $id=$_SESSION['service'];
}

include "functions/functions.php";
$sql = "SELECT * FROM services WHERE id='$id'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$title = $get_data['heading'];
$body = $get_data['body'];


?>
<!doctype html>
<html class="no-js" lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- title -->
        <title>About us | five elements advisory</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <?php
        $where = array('page'=>'about');
        $get_seo = $obj->fetch_records('seo',$where);
        foreach($get_seo as $row)
        {
            $author = $row['author'];
            $description = $row['description'];
            $keywords = $row['keywords'];
        }
        ?>
        <meta name="author" content="<?=$author?>">
        <!-- description -->
        <meta name="description" content="<?=$description?>">
        <!-- keywords -->
        <meta name="keywords" content="<?=$keywords?>"> <!-- favicon -->
        <?php include_once 'plugins/resources.php'?>
    </head>
    <body>
        <!-- start header -->
        <header>
            <!-- start navigation -->
                <?php include_once 'plugins/nav.php'?>

            <!-- end navigation -->
        </header>
        <!-- end header -->

        <section class="wow fadeIn cover-background background-position-top margin-100px-top" style="background-image: url(images/services.jpg); visibility: visible; animation-name: fadeIn;">
            <div class="opacity-medium bg-extra-dark-gray"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                        <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                            <!-- start sub title -->
                            <!-- <span class="text-white opacity6 alt-font margin-10px-bottom display-block text-uppercase text-small">25 April 2017&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;by <a href="blog-masonry.html" class="text-white">Jay Benjamin</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="blog-masonry.html" class="text-white">Design</a>, <a href="blog-masonry.html" class="text-white">Branding</a></span> -->
                            <!-- end sub title -->
                            <!-- start page title -->
                            <h1 class="text-white alt-font font-weight-600 margin-10px-bottom"><?=$title?></h1>
                            <!-- end page title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wow fadeIn padding-20px-tb border-bottom border-color-extra-light-gray" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left">
                            <div class="breadcrumb alt-font text-small no-margin-bottom">
                                <!-- breadcrumb -->
                                <ul>
                                    <li><a href="#" class="text-medium-gray">Home</a></li>
                                    <li><a href="index#services" class="text-medium-gray">Services</a></li>
                                    <li class="text-medium-gray"><?=$title?></li>
                                </ul>
                                <!-- end breadcrumb -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 center-col last-paragraph-no-margin xs-text-center">
                        <!-- <h5 class="alt-font font-weight-600 text-extra-dark-gray"><?=$title?></h5> -->


                        <p class="text-large line-height-30 text-medium-gray text-justify xs-text-center xs-line-height-26"><?=$body?></p>

                    </div>
                </div>
            </div>
        </section>

        <!-- start footer -->
        <?php include_once('plugins/footer.php') ?>
        <!-- end footer -->


    </body>
</html>
