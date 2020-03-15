<?php
include_once 'functions/functions.php';
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Resource not found</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <!-- favicon -->
    <?php include_once 'plugins/resources.php'?>
    </head>
    <body>
    <?php include_once 'plugins/nav.php'?>
        <!-- start page not found section -->
        <section id="home" class="no-padding parallax mobile-height wow fadeIn" data-stellar-background-ratio="0.5" style="background-image:url('images/parallax-bg31.jpg');">
            <div class="opacity-full bg-extra-dark-gray"></div>
            <div class="container position-relative full-screen">
                <div class="slider-typography text-center">
                    <div class="slider-text-middle-main">
                        <div class="slider-text-middle">
                            <div class="bg-black-opacity-light width-50 center-col sm-width-80" style="margin-top:100px;">
                                <div class="padding-fifteen-all xs-padding-20px-all">
                                    <span class="title-extra-large text-white font-weight-600 display-block margin-30px-bottom xs-margin-10px-bottom">404!</span>
                                    <h6 class=" text-danger font-weight-600 alt-font display-block margin-5px-bottom">Resource Not Found</h6>

                                    <a href="http://5eadvisory.com/" class="btn btn-transparent-white btn-medium text-extra-small border-radius-4 margin-30px-top" ><i class="ti-arrow-left margin-5px-right no-margin-left" aria-hidden="true"></i> Back To Homepage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page not found section -->
        <!-- start footer -->
<?php include_once 'plugins/footer.php'?>
    </body>
</html>
