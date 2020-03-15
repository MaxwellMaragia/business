<?php
session_start();
if(!$_SESSION['admin']){
  header('location:index');
}
include "../functions/WB-functions.php";

?>
<!doctype html>
<html class="no-js" lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- title -->
        <title>Web-builder</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />

        <?php include_once '../plugins/WB-resources.php'?>
    </head>
    <body>
        <!-- start header -->
        <header>
            <!-- start navigation -->
                <?php include_once '../plugins/WB-nav.php'?>

            <!-- end navigation -->
        </header>
        <!-- end header -->
        <section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space" style="margin-top: 109px; visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row equalize">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table" style="height: 26px;">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom ">Buttons</h1>
                            <!-- end page title -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Button Style 01</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 center-col text-center btn-dual">
                        <!-- start buttons -->
                        <a class="btn btn-extra-large btn-dark-gray md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Button Extra Large</a>
                        <a class="btn btn-large btn-dark-gray md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Button Large</a>
                        <a class="btn btn-medium btn-dark-gray md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Button Medium</a>
                        <a class="btn btn-small btn-dark-gray md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Button Small</a>
                        <a class="btn btn-very-small btn-dark-gray md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Extra Small</a>
                        <!-- end buttons -->
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn bg-extra-dark-gray" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Button Style 02</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 center-col text-center btn-dual">
                        <!-- start buttons -->
                        <a class="btn btn-extra-large btn-white md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Button Extra Large</a>
                        <a class="btn btn-large btn-white md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Button Large</a>
                        <a class="btn btn-medium btn-white md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Button Medium</a>
                        <a class="btn btn-small btn-white md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Button Small</a>
                        <a class="btn btn-very-small btn-white md-margin-15px-bottom sm-display-table sm-margin-lr-auto" href="#">Extra Small</a>
                        <!-- end buttons -->
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn bg-black" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Button Style 03</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 center-col text-center btn-dual">
                        <!-- start buttons -->
                        <a href="#" class="btn-primary btn btn-small button border-radius-4 margin-5px-all md-margin-15px-bottom sm-margin-lr-auto sm-display-table">Primary Button <i class="ti-arrow-right"></i></a>
                        <a href="#" class="btn-success btn btn-small button border-radius-4 margin-5px-all md-margin-15px-bottom sm-margin-lr-auto sm-display-table">Success Button <i class="ti-arrow-right"></i></a>
                        <a href="#" class="btn-info btn btn-small button border-radius-4 margin-5px-all md-margin-15px-bottom sm-margin-lr-auto sm-display-table">Info Button <i class="ti-arrow-right"></i></a>
                        <a href="#" class="btn-warning btn btn-small button border-radius-4 margin-5px-all md-margin-15px-bottom sm-margin-lr-auto sm-display-table">Warning Button <i class="ti-arrow-right"></i></a>
                        <a href="#" class="btn-danger btn btn-small button border-radius-4 margin-5px-all md-margin-15px-bottom sm-margin-lr-auto sm-display-table">Danger Button <i class="ti-arrow-right"></i></a>
                        <!-- end buttons -->
                    </div>
                </div>
            </div>
        </section>


    </body>
</html>
