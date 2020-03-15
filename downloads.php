<?php
include_once 'functions/functions.php';
$sql = "SELECT value FROM general_settings WHERE name='case_study'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$desc = $get_data['value'];
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Downloads | five elements advisory</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <!-- favicon -->
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

        <!-- start page title section -->
        <section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space" style="margin-top: 107px; visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row equalize">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table" style="height: 26px;">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom ">Downloads</h1>
                            <!-- end page title -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 display-table text-right xs-text-left xs-margin-10px-top" style="height: 26px;">
                        <div class="display-table-cell vertical-align-middle breadcrumb text-small alt-font">
                            <!-- breadcrumb -->
                            <ul class="xs-text-center">
                                <li><a href="index" class="text-dark-gray">Home</a></li>
                                <li><a href="downloads" class="text-dark-gray">Downloads</a></li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

        <section class="wow fadeIn bg-white" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
              <div class="col-md-12 text-center margin-50px-bottom sm-margin-70px-bottom xs-margin-50px-bottom">
                  <!-- <p class="alt-font margin-5px-bottom  text-medium-gray text-small">Get the most</p> -->
                  <h5 class=" alt-font text-custom-blue margin-20px-bottom font-weight-700 sm-width-100 xs-width-100">Downloads</h5>
                  <span class="separator-line-horrizontal-medium-light2 bg-custom-yellow display-table margin-auto width-100px"></span>
              </div>
            </div>
                </div>
                <div class="row">
                    <div class="pricing-box-style1">
                        <!-- start pricing item -->
                        <?php
                        $sql = "SELECT * FROM Downloads ORDER BY id DESC LIMIT 3";
                        $exe = mysqli_query($obj->con,$sql);
                        while($get_download = mysqli_fetch_assoc($exe))
                        {
                            ?>

                        <div class="col-md-3 col-sm-6 col-xs-12 text-center sm-margin-30px-bottom wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="pricing-box border-all border-width-1 border-color-extra-light-gray bg-white">
                                <div class="bg-extra-dark-gray padding-10px-tb alt-font text-white font-weight-600 "><?=$get_download['title']?></div>
                                <div class="bg-light-gray padding-35px-all">
                                    <h4 class="text-extra-dark-gray font-weight-500 no-margin-bottom"><a href="management/<?=$get_download['document']?>"><i class="ti-download"></i></a></h4>
                                    <div class="text-extra-small  margin-5px-top"><a href="management/<?=$get_download['document']?>">Download</a></div>
                                </div>
                                <!-- start pricing features -->

                                <!-- end pricing features -->
                            </div>
                        </div>
                        <?php } ?>
                        <!-- end pricing item -->

                    </div>
                </div>
            </div>
        </section>


        <!-- start footer -->
        <?php include_once('plugins/footer.php') ?>
        <!-- end footer -->


    </body>
</html>
