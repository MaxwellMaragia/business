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
        <title>Case study | five elements advisory</title>
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
                            <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom ">Case_study</h1>
                            <!-- end page title -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 display-table text-right xs-text-left xs-margin-10px-top" style="height: 26px;">
                        <div class="display-table-cell vertical-align-middle breadcrumb text-small alt-font">
                            <!-- breadcrumb -->
                            <ul class="xs-text-center">
                                <li><a href="index" class="text-dark-gray">Home</a></li>
                                <li><a href="case_study" class="text-dark-gray">Case_study</a></li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        <section class="wow fadeIn md-text-left" style="visibility: visible; animation-name: fadeIn;">
            <div class="container md-text-left">

                <div class="row md-text-left">
                <?=$desc?>
                </div>

            </div>
        </section>






        <!-- start footer -->
        <?php include_once('plugins/footer.php') ?>
        <!-- end footer -->


    </body>
</html>
