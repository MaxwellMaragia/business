<?php
include "functions/functions.php";
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Careers | five elements advisory</title>
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
                            <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom ">Careers</h1>
                            <!-- end page title -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 display-table text-right xs-text-left xs-margin-10px-top" style="height: 26px;">
                        <div class="display-table-cell vertical-align-middle breadcrumb text-small alt-font">
                            <!-- breadcrumb -->
                            <ul class="xs-text-center">
                                <li><a href="index" class="text-dark-gray">Home</a></li>
                                <li><a href="careers" class="text-dark-gray">Careers</a></li>
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
                      <div class="row text-center margin-40px-bottom">
                          <div class="col-md-12">
                            <p class="alt-font text-medium-gray margin-5px-bottom  text-small">Want to join us?</p>
                            <h5 class=" alt-font text-custom-blue margin-20px-bottom font-weight-700 sm-width-100 xs-width-100">Available careers</h5>
                            <span class="separator-line-horrizontal-medium-light2 bg-deep-pink display-table margin-auto width-100px"></span>
                          </div>
                      </div>
                        <div class="row equalize xs-equalize-auto">
                            <?php
                            $where = array('state'=>1);
                            $get_careers = $obj->fetch_records('careers',$where);
                            if($get_careers){
                            foreach($get_careers as $row)
                            {
                                ?>
                                <a href="career_details?id=<?= $row['id'] ?>" style="cursor:pointer;">
                                    <div class="col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-margin-15px-bottom wow fadeIn" style="visibility: visible; animation-name: fadeIn; height: 289px;">
                                        <!-- fresh news item -->
                                        <div class="blog-post blog-post-style7 border-all border-color-light-gray padding-fourteen-all md-padding-ten-all xs-padding-30px-all bg-white inner-match-height">
                                            <div class="post-details margin-50px-top">
                                                <!-- <span class="text-extra-small text-uppercase display-block margin-four-bottom sm-margin-two-bottom">17 july 2017</span> -->
                                                <span class="text-large  alt-font margin-10px-bottom sm-margin-30px-bottom display-block"><a class="text-custom-blue" href="career_details?id=<?=$row['id']?>"><?=$row['title']?></a></span>

                                                <div class="author padding-10px-top position-relative">
                                                    <span class=" ">Application deadline : <?=$row['deadline']?></span>
                                                    <small>
                                                        <span class="text-white display-block margin-four-bottom sm-margin-two-bottom">
                                                        <?=$row['contract']?>
                                                        </span>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end fresh news item -->
                                    </div>
                                </a>
                            <?php
                            }
                        }
                        else{
                            ?>
                         <blockquote class="border-color-deep-pink">
                            <p>No careers available at this time</p>
                         </blockquote>
                         <?php
                        }
                            ?>


                        </div>
                    </div>
                </section>






        <!-- start footer -->
        <?php include_once('plugins/footer.php') ?>
        <!-- end footer -->


    </body>
</html>
