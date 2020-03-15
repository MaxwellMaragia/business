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
                            <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom ">Blockquotes</h1>
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
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Blockquote Style 01</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12 center-col">
                        <!-- start blockquote -->
                        <blockquote class="border-color-deep-pink">
                            <p>Reading is not only informed by what’s going on with us at that moment, but also governed by how our eyes and brains work to process information. What you see and what you’re experiencing as you read these words is quite different.</p>
                            <footer>Jason Maria</footer>
                        </blockquote>
                        <!-- end blockquote -->
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn bg-light-gray" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Blockquote Style 02</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12 center-col">
                        <!-- start blockquote -->
                        <i class="fas fa-quote-left text-deep-pink icon-large margin-15px-bottom"></i>
                        <h5 class="text-extra-dark-gray margin-50px-bottom sm-margin-20px-bottom alt-font">Hello, I'm a UI/UX Designer &amp; Frontend Developer from Victoria, Australia. I hold a master degree of Design from World University.</h5>
                        <!-- end blockquote -->
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Blockquote Style 03</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 center-col col-xs-12 position-relative height-600px xs-height-350px cover-background" style="background-image: url('http://placehold.it/960x850');">
                        <div class="opacity-extra-medium bg-black"></div>
                        <!-- start blockquote -->
                        <div class="bg-custom-blue width-50 text-center text-white padding-eight-all absolute-middle-center z-index-5 md-width-70 xs-width-85 xs-padding-twelve-tb xs-padding-five-lr">
                            <span class="special-char-medium text-custom-yellow absolute-middle-center top-0 position-absolute fas fa-quote-left"></span>
                            <h6 class="font-weight-300 no-margin-bottom">We design brand, digital experience &amp; marketing campaigns that engage the right customers.</h6>
                        </div>
                        <!-- end blockquote -->
                    </div>
                </div>
            </div>
        </section>


    </body>
</html>
