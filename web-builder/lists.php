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
                            <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom ">Lists</h1>
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
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">List Style 02</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-10 col-xs-12 center-col">
                        <ul class="no-padding list-style-5">
                            <li>Beautiful and easy to understand UI, professional animations</li>
                            <li>Theme advantages are pixel perfect design &amp; clear code delivered</li>
                            <li>Present your services with flexible, convenient and multipurpose</li>
                            <li>Find more creative ideas for your projects </li>
                            <li>Unlimited power and customization possibilities</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn bg-extra-dark-gray" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">List Style 02</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-10 col-xs-12 center-col">
                        <ul class="no-padding list-style-4 list-style-color">
                            <li>Beautiful and easy to understand UI, professional animations</li>
                            <li>Theme advantages are pixel perfect design &amp; clear code delivered</li>
                            <li>Present your services with flexible, convenient and multipurpose</li>
                            <li>Find more creative ideas for your projects </li>
                            <li>Unlimited power and customization possibilities</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


    </body>
</html>
