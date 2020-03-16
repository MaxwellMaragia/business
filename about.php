<?php
include "functions/functions.php";
$sql = "SELECT value FROM about WHERE name='about_header_title'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$title = $get_data['value'];


$sql = "SELECT value FROM about WHERE name='about_header_text'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$text = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='about_header_button_text'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$button_text = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='about_header_image'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$about_header_image = $get_data['value'];


$sql = "SELECT value FROM about WHERE name='about_header_button_link'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$button_link = $get_data['value'];
$current_file=explode('/',$button_link);
$current_file=$current_file[1];

$sql = "SELECT value FROM about WHERE name='blue_section_title'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$blue_title = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='blue_section_image'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$blue_image = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='blue_section_text'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$blue_text = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='blue_section_button_text'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$bs_button_text = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='blue_section_button_url'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$bs_button_url = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='ceo_section_title'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$ceo_remark_title = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='ceo_name'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$ceo_name = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='ceo_section_text'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$ceo_text = $get_data['value'];

$sql = "SELECT value FROM about WHERE name='ceo_section_image'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$ceo_image = $get_data['value'];


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

        <section class="no-padding wow fadeIn bg-white margin-100px-top" id="services" style="visibility: visible; animation-name: fadeIn;">
            <div class="container-fluid no-padding">
                <div class="row equalize sm-equalize-auto no-margin">
                    <div class="col-md-6 col-sm-12 col-xs-12 position-relative sm-height-550px xs-height-350px cover-background wow slideInLeft md-text-left" data-wow-duration="900ms" style="background-image: url('management/<?=$about_header_image?>'); visibility: visible; animation-duration: 900ms; animation-name: slideInLeft; height: 639px;"></div>
                    <div class="col-md-6 col-sm-12 col-xs-12 display-table wow slideInRight last-paragraph-no-margin" data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: slideInRight; height: 639px;">
                        <div class="display-table-cell vertical-align-middle padding-fifteen-all sm-padding-ten-all xs-padding-30px-all md-text-left">
                            <!-- <span class="text-medium margin-20px-bottom sm-margin-15px-bottom display-block alt-font xs-margin-15px-bottom">Want to know</span> -->
                            <h4 class="alt-font text-left xs-text-center text-custom-blue font-weight-700"><?=$title?></h4>
                            <div class="separator-line-horrizontal-full bg-custom-yellow margin-30px-bottom xs-margin-30px-bottom height-5px width-70 left-col xs-center-col "></div>
                            <p class="width-100 md-width-100 xs-width-100"><?=$text?></p>
                            <a class="btn btn-small btn-custom-blue font-weight-700 margin-10px-top" href="management/documents/<?=$current_file?>"><?=$button_text?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn no-padding parallax one-fourth-screen sm-height-500px xs-height-350px background-position-x-50 " data-stellar-background-ratio="0.5" style="background-image: url('management/<?=$blue_image?>'); background-position: 25px -155.5px; visibility: visible; animation-name: fadeIn;margin-top:-63px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"></div>
                </div>
            </div>
        </section>


        <?php
        $get_team = $obj->fetch_all_records('team');
        if($get_team)
        {
            ?>
            <!-- start team section -->
            <section class="wow fadeIn">
                <div class="container">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-8 col-sm-6 col-xs-12 text-center margin-50px-bottom sm-margin-70px-bottom xs-margin-50px-bottom">
                        <!-- <p class="alt-font margin-5px-bottom  text-medium-gray text-small">Get the most</p> -->
                        <h5 class=" alt-font text-custom-blue margin-20px-bottom font-weight-700 sm-width-100 xs-width-100">Our team</h5>
                        <span class="separator-line-horrizontal-medium-light2 bg-custom-yellow display-table margin-auto width-100px"></span><br>
                        <h6 class="font-weight-300 text-extra-dark-gray no-margin"><strong class="font-weight-400">Talent</strong> wins games, but <strong class="font-weight-400">teamwork</strong> and intelligence wins championships</h6>
                    </div>
                    <div class="col-md-2"></div>


                    </div>
                    <div class="row">
                        <!-- start team item -->
                        <?php
                        foreach($get_team as $row)
                        {
                            ?>

                            <div class="col-md-3 col-sm-6 col-xs-12 team-block text-left team-style-1 sm-margin-seven-bottom xs-margin-30px-bottom wow fadeInRight" data-wow-duration="900ms">
                                <figure>
                                    <div class="team-image xs-width-100 bg-dark-gray" style="height:250px">
                                        <img src="management/<?=$row['image']?>" alt="<?=$row['name']?>">
                                        <div class="overlay-content text-center">
                                            <div class="display-table height-100 width-100">
                                                <div class="vertical-align-bottom display-table-cell icon-social-small padding-twelve-all">
                                                    <span class="text-white text-small display-inline-block no-margin"><?=$row['description']?></span>
                                                    <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                                    <a href="<?=$row['facebook']?>" class="text-white" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="<?=$row['twitter']?>" class="text-white" target="_blank"><i class="fab fa-twitter"></i></a>
                                                    <a href="<?=$row['linkedin']?>" class="text-white" target="_blank"><i class="fab fa-linkedin"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="team-overlay bg-extra-dark-gray opacity8"></div>
                                    </div>
                                    <figcaption>
                                        <div class="team-member-position margin-20px-top text-center">
                                            <div class="text-small font-weight-500 text-extra-dark-gray "><?=$row['name']?></div>
                                            <div class="text-extra-small  text-medium-gray"><?=$row['title']?></div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- end team item -->

                    </div>
                </div>
            </section>
            <!-- end team section -->
        <?php
        }

        ?>

        <!-- start section -->
        <section class="extra-big-section parallax wow fadeIn" data-stellar-background-ratio="0.5" style="background-image: url('management/<?=$blue_image?>')">
            <div class="opacity-full-dark bg-extra-dark-gray"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-11 col-xs-12 center-col text-center">
                        <div class="alt-font text-custom-yellow  margin-20px-bottom"><?=$blue_title?>y</div>
                        <h5 class="text-light-gray alt-font margin-40px-bottom xs-margin-30px-bottom"><?=$blue_text?></h5>
                        <a href="<?=$bs_button_url?>" class="btn btn-medium btn-white btn-rounded"><?=$bs_button_text?> </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class=" bg-light-gray wow fadeIn">
            <div class="container">
                <div class="row equalize sm-equalize-auto">
                    <div class="xs-margin-50px-top col-md-5 col-sm-12 md-margin-100px-top sm-text-center col-md-offset-1 sm-padding-50px-all xs-padding-15px-lr pull-right">
                        <div class="display-table width-100 height-100">
                            <div class="display-table-cell vertical-align-middle">
                                <i class="fas fa-quote-left text-deep-pink icon-medium margin-15px-bottom"></i>
                                <h5 class="text-custom-blue alt-font  font-weight-700"><?=$ceo_remark_title?></h5>
                                <p class="width-90 sm-width-100"><?=$ceo_text?></p>
                                <img src="#" alt="" class="margin-15px-top">
                                <span class="text-extra-dark-gray text-large display-block margin-30px-top alt-font font-weight-600"><?=$ceo_name?></span>
                                <span class="display-block">Chief Executive Officer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-center">
                        <div class="display-table width-100 height-100">
                            <div class="display-table-cell vertical-align-bottom">
                                <img src="<?=$ceo_image?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->


        <!-- start footer -->
        <?php include_once('plugins/footer.php') ?>
        <!-- end footer -->


    </body>
</html>
