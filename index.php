<?php
include_once 'functions/functions.php';

$sql = "SELECT value FROM home WHERE name='home_top_banner'";
$exe = mysqli_query($obj->con,$sql);
$get_banner = mysqli_fetch_assoc($exe);
$banner = $get_banner['value'];

$sql = "SELECT value FROM home WHERE name='youtube_video_url'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$youtube_video_url = $get_data['value'];

$sql = "SELECT value FROM home WHERE name='youtube_section_image'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$youtube_section_image = $get_data['value'];

$sql = "SELECT value FROM home WHERE name='youtube_section_text'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$youtube_section_text = $get_data['value'];

$sql = "SELECT value FROM home WHERE name='banner_heading'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$banner_heading = $get_data['value'];

$sql = "SELECT value FROM home WHERE name='video'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$banner_video = $get_data['value'];

$sql = "SELECT value FROM home WHERE name='banner_text'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$banner_text = $get_data['value'];

$sql = "SELECT value FROM home WHERE name='banner_button_text'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$banner_button_text = $get_data['value'];


$sql = "SELECT value FROM home WHERE name='banner_button_link'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$banner_button_link = $get_data['value'];


session_start();
if(isset($_POST['service'])){
    $_SESSION['service']=$obj->con->real_escape_string(htmlspecialchars($_POST['service']));
  if ($_SESSION['service']) {
    header('location:service');
  }

}
?>



<!doctype html>
<html class="no-js" lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- title -->
        <title>Smart Business Advisory Services by 5E Advisory</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <?php
        $where = array('page'=>'home');
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
        <meta name="keywords" content="<?=$keywords?>">
        <!-- favicon -->
        <?php include_once 'plugins/resources.php'?>

        <style media="screen">
          @media screen and (max-width: 1000px) {
            .banner-juu{
              height:520px;
            }
            .vida{
              background:#23225e;
              marin-top: 10px;
            }
            .vida video{
              width:600px;
              height:auto;
            }

            .maneno .blue-part{
              background: none;
              text-align: center;margin-top: 10px;
              /* visibility: hidden; */
            }
          }

        </style>
    </head>
    <body>
        <!-- start header -->
        <header>
            <!-- start navigation -->
                <?php include_once 'plugins/nav.php'?>
            <!-- end navigation -->
        </header>
        <!-- end header -->

        <?php if($banner==1){?>
        <!-- start parallax hero section -->
        <section class="banner-juu wow fadeIn no-padding parallax " data-stellar-background-ratio="0.5" >
            <div class="vida opacity-extra-medium bg-black">
              <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" style="">
                <source src="management/<?=$banner_video?>" type="video/mp4">
              </video>
            </div>
            <div class=" container-fluid position-relative full-screen">
                <div class="maneno slider-typography">
                    <div class="slider-text-middle-main">
                        <div class="slider-text-bottom ">
                            <div class=" blue-part col-lg-6 col-md-7 col-sm-12 col-xs-12 pull-right bg-custom-blue-opacity padding-six-lr md-padding-seven-lr padding-five-tb xs-padding-20px-all last-paragraph-no-margin">
                                <!-- <div class="box-separator-line width-180px bg-white md-width-120px sm-width-90px sm-display-none"></div> -->
                                <h1 class="text-white  font-weight-600 alt-font width-95 sm-width-100 margin-60px-top"><?=$banner_heading?></h1>
                                <p class="text-large font-weight-300 text-white width-75 md-width-85 sm-width-95 xs-width-100 xs-display-none"><?=$banner_text?></p><br>
                                <!-- <a href="about" class=" text-center btn btn-medium btn-white margin-20px-top text-link-deep-pink xs-margin-10px-top">Read more</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end parallax hero section -->
        <?php }else{ ?>


        <section class="wow fadeIn no-padding parallax xs-background-image-center" data-stellar-background-ratio="0.5" style="background-image: url(&quot;http://placehold.it/1920x1200&quot;); background-position: 0px 0px; visibility: visible; animation-name: fadeIn;">
            <div class="opacity-extra-medium bg-black ">
              <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" style="">
                <source src="management/<?=$banner_video?>" type="video/mp4">
              </video>
            </div>
            <div class="container-fluid padding-thirteen-lr one-fourth-screen xs-padding-15px-lr">
                <div class="row height-100">
                    <div class="position-relative height-100">
                        <div class="slider-typography">
                            <div class="slider-text-middle-main">
                                <div class="slider-text-bottom">
                                    <div class="col-lg-12 text-center margin-100px-bottom" >
                                      <h1 class="text-white font-weight-800 alt-font width-100 sm-width-100 "><?=$banner_heading?><span class="font-weight-300"> </span></h1>
                                      <p class="text-large text-center font-weight-600 width-95 text-white  md-width-85 sm-width-95 xs-width-100 xs-display-none"><?=$banner_text?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php } ?>

        <section class="wow fadeIn bg-white" style="visibility: visible; animation-name: fadeIn;" id="services">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                <div class="col-md-12 text-center margin-50px-bottom sm-margin-70px-bottom xs-margin-50px-bottom">
                    <!-- <p class="alt-font margin-5px-bottom  text-medium-gray text-small">Get the most</p> -->
                    <h5 class=" alt-font text-custom-blue margin-20px-bottom font-weight-700 sm-width-100 xs-width-100">Our services</h5>
                    <span class="separator-line-horrizontal-medium-light2 bg-custom-yellow display-table margin-auto width-100px"></span>
                </div>
              </div>
                    <div class="col-md-12 hover-option4 margin-5px-bottom">
                        <div class="swiper-multy-row-container overflow-hidden swiper-container-horizontal">
                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">

                                <!-- start slide item -->
                                <?php
                                $sql = "SELECT * FROM services ORDER BY id DESC";
                                $exe = mysqli_query($obj->con,$sql);
                                while($get_service = mysqli_fetch_assoc($exe))
                                {
                                    ?>
                                <div class="swiper-slide grid-item swiper-slide-active bg-custom-blue" style="width: 273.75px; margin-right: 15px; height:200px">
                                    <div class="text-center padding-eighteen-all feature-box-13 position-relative xs-margin-20px-top
                                    sm-margin-40px-top md-padding-ten-all sm-padding-25px-all xs-padding-eight-all">
                                      <i class="<?=$get_service['icon']?> ico text-custom-yellow icon-medium margin-15px-bottom xs-margin-10px-bottom"></i>
                                      <form method="post"><button name="service" value="<?=$get_service['id']?>" type="submit" class=" wow fadeInUp" data-wow-delay="0.6s" href="#<?=$get_service['id']?>" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;background: none; border: none;">
                                      <p class="text-medium text-extra-light-gray alt-font"><?=$get_service['heading']?></p>
                                    </button></form>
                                      <div class="feature-box-overlay bg-deep-pink"></div>
                                   </div>
                                </div>

                                <?php } ?>
                                <!-- end slide item -->


                            </div>
                            <!-- start slider pagination -->
                            <div class="swiper-portfolio-prev swiper-button-black-highlight swiper-button-disabled"><i class="ti-arrow-left"></i></div>
                            <div class="swiper-portfolio-next swiper-button-black-highlight swiper-button-disabled"><i class="ti-arrow-right"></i></div>
                            <!-- end slider pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- start parallax with feature box section -->
        <section class="parallax one-second-screen parallax-feature-box sm-height-auto " data-stellar-background-ratio="0.3" style="background-image:url('management/<?=$youtube_section_image?>');">
            <div class="opacity-medium bg-extra-dark-gray"></div>
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-8 text-center center-col sm-margin-60px-bottom xs-margin-40px-bottom margin-50px-top">
                        <a class="popup-youtube" href="<?=$youtube_video_url?>">
                            <img src="images/icon-play.png" class="width-130px" alt=""/></a>
                        <h4 class="alt-font text-white"><?=$youtube_section_text?></h4>
                    </div>
                </div>

            </div>
        </section>
        <!-- end parallax with feature box section -->

        <section class="wow fadeIn bg-light-gray" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
              <div class="row">
              <div class="col-md-12">
                <div class="col-md-12 text-center margin-50px-bottom sm-margin-70px-bottom xs-margin-50px-bottom">
                    <!-- <p class="alt-font margin-5px-bottom  text-medium-gray text-small">Get the most</p> -->
                    <h5 class=" alt-font text-custom-blue margin-20px-bottom sm-margin-50px-bottom font-weight-700 sm-width-100 xs-width-100">Insights</h5>
                    <span class="separator-line-horrizontal-medium-light2 bg-custom-yellow display-table margin-auto width-100px"></span>
                </div>
              </div>
            </div>
                <div class="row equalize xs-equalize-auto">
                  <div class="col-md-12 no-padding xs-padding-15px-lr">
                      <ul class="blog-grid blog-3col gutter-large blog-post-style5" style="position: relative; height: 550.359px;">
                          <li class="grid-sizer"></li>
                          <!-- start blog post item -->
                          <?php

                          $sql = "SELECT * FROM news ORDER BY id DESC limit 3";
                          $exe = mysqli_query($obj->con,$sql);
                          while($get_insight = mysqli_fetch_assoc($exe))
                          {
                              $cid = $get_insight['category'];
                              $author_id = $get_insight['author'];
                              $media_file = $get_insight['media_type'];

                              $where = array('id'=>$cid);
                              $get_cat = $obj->fetch_records('categories',$where);
                              foreach($get_cat as $row)
                              {
                                  $category = $row['name'];
                              }


                              $aid = $get_insight['author'];
                              $where = array('id'=>$aid);
                              $get_author = $obj->fetch_records('users',$where);
                              foreach($get_author as $row)
                              {
                                  $author = $row['name'];
                              }
                              ?>
                              <li class="grid-item fadeInUp last-paragraph-no-margin" style="position: absolute; left: 0%; top: 0px; visibility: visible; animation-name: fadeInUp;">
                                  <div class="blog-post bg-white">
                                      <div class="blog-post-images overflow-hidden">
                                          <a href="insight?id=<?=$get_insight['id']?>">
                                              <?php
                                              if($media_file=='video')
                                              {
                                                  ?>
                                                  <video  controls height="243px" style="margin-top:-19px">
                                                      <source src="management/<?=$get_insight['media']?>" type="video/mp4">
                                                      <source src="movie.ogg" type="video/ogg">
                                                      Your browser does not support the video tag.
                                                  </video>
                                                  <?php
                                              }
                                              else if($media_file=='image'){
                                                  ?>
                                                  <img src="management/<?=$get_insight['media']?>" alt="<?=$get_insight['heading']?>" style="height: 225px;">
                                              <?php
                                              }
                                              else if($media_file=='link'){
                                                ?>
                                                <iframe height="218" width="100%" src="https://www.youtube.com/embed/<?=$get_insight['media']?>?rel=0&amp;controls=0&amp;showinfo=0" allowfullscreen="" id="fitvid0"></iframe>
                                            <?php
                                            }

                                              ?>

                                          </a>
                                          <div class="blog-categories bg-white  text-extra-small alt-font"><a href="insights_category?id=<?=$get_insight['category']?>"><?=$category?></a></div>
                                      </div>
                                      <div class="post-details inner-match-height padding-40px-all sm-padding-20px-all xs-padding-30px-tb" style="height:200px">
                                          <div class="blog-hover-color"></div>
                                          <a href="insight?id=<?=$get_insight['id']?>" class="alt-font post-title text-medium text-custom-blue display-block md-width-100 margin-5px-bottom"><?=$get_insight['heading']?></a>
                                          <div class="author">
                                              <span class="text-medium-gray  text-extra-small display-inline-block">by <a class="text-medium-gray"><?=$author?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<?=$get_insight['date']?></span>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          <?php
                          }

                          ?>

                      </ul>
                      <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 center-col text-center" style="padding-top:35px">
                          <h5 class="alt-font  font-weight-700 text-custom-blue width-80 center-col margin-10px-bottom md-width-100 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Would you like to read more?</h5>
                          <a href="insights" class="btn btn-medium btn-rounded btn-custom-blue wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Explore insights</a>
                      </div>
                  </div>
                </div>
            </div>
        </section>


        <?php
        $get_reviews = $obj->fetch_all_records('reviews');

        if($get_reviews)
        {
            ?>
        <section class="parallax wow fadeIn sm-margin-50px-top" id="testimonials" data-stellar-background-ratio="0.5" style="background-image: url(&quot;images/testimonial-parallax-img.jpg&quot;);background-position: 0px 3.23438px; visibility: visible; animation-name: fadeIn;margin-top:3px">
            <div class="opacity-medium bg-black"></div>
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center margin-50px-bottom sm-margin-70px-bottom xs-margin-50px-bottom">
                    <!-- <p class="alt-font margin-5px-bottom  text-medium-gray text-small">Get the most</p> -->
                    <h5 class=" alt-font text-white margin-20px-bottom font-weight-700 sm-width-100 xs-width-100">Reviews</h5>
                    <span class="separator-line-horrizontal-medium-light2 bg-custom-yellow display-table margin-auto width-100px"></span>
                </div>
              </div>

                <div class="row">
                      <div class="swiper-slider-second swiper-container white-move swiper-container-horizontal">
                        <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">

                            <!-- start testimonial slide item -->
                            <?php
                            foreach($get_reviews as $row)
                            {
                                if($row['image'])
                                {
                                    $image = "management/".$row['image'];
                                }
                                else{
                                    $image = 'management/images/reviews/user.jpg';
                                }
                                ?>
                            <div class="swiper-slide" style="width: 1170px;">
                                <div class="col-md-7 col-sm-10 col-xs-12 center-col equalize sm-equalize-auto">
                                    <div class="col-md-3 col-sm-3 col-xs-12 display-table" style="height: 133px;">
                                        <div class="display-table-cell vertical-align-middle">
                                            <img src="<?=$image?>" alt="" class="border-radius-100 width-150px xs-width-100px xs-margin-15px-bottom"  data-no-retina="">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-12 text-left xs-text-center margin-20px-left xs-no-margin-left display-table last-paragraph-no-margin" style="height: 133px;">
                                        <div class="display-table-cell vertical-align-middle">
                                            <p class="text-extra-light-gray"><?=$row['review']?></p>
                                            <span class="text-white alt-font  text-small margin-15px-top display-inline-block display-inline-block"><?=$row['name']?></span><br>
                                            <span class="text-custom-yellow text-extra-small text-medium-gray"><?=$row['role']?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <!-- end testimonial slide item -->
                        </div>
                        <div class="swiper-pagination display-none"></div>
                        <div class="swiper-button-next slider-long-arrow-white"></div>
                        <div class="swiper-button-prev slider-long-arrow-white swiper-button-disabled"></div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        }
        ?>




          <section class="wow fadeIn bg-light-grey" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-12 text-center margin-50px-bottom sm-margin-70px-bottom xs-margin-50px-bottom">
                          <!-- <p class="alt-font margin-5px-bottom  text-medium-gray text-small">Get the most</p> -->
                          <h5 class=" alt-font text-custom-blue margin-20px-bottom font-weight-700 sm-width-100 xs-width-100">Industries</h5>
                          <span class="separator-line-horrizontal-medium-light2 bg-custom-yellow display-table margin-auto width-100px"></span>
                      </div>
                    </div>
                </div>
                <div class="container">
                    <!-- row -->
                    <div class="row show-grid xs-padding-right xs-padding-left">
                      <div class="industrie col-md-1"></div>
                        <div class="industries col-md-2 col-xs-6"><div class="text-center padding-eighteen-all feature-box-13 position-relative md-padding-ten-all sm-padding-25px-all xs-padding-eight-all">
                            <i class="ti-thumb-up ico text-custom-yellow icon-medium margin-15px-bottom xs-margin-10px-bottom"></i>
                            <p class="text-medium text-extra-light-gray alt-font">Insurance</p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div></div>
                        <div class="industries col-md-2 col-xs-6"><div class="text-center padding-eighteen-all feature-box-13 position-relative md-padding-ten-all sm-padding-25px-all xs-padding-eight-all">
                            <i class="ti-bag ico text-custom-yellow icon-medium margin-15px-bottom xs-margin-10px-bottom"></i>
                            <p class="text-medium text-extra-light-gray alt-font">Retail</p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div></div>
                        <div class="industries col-md-2 col-xs-6"><div class="text-center padding-eighteen-all feature-box-13 position-relative md-padding-ten-all sm-padding-25px-all xs-padding-eight-all">
                            <i class="ti-heart ico text-custom-yellow icon-medium margin-15px-bottom xs-margin-10px-bottom"></i>
                            <p class="text-medium text-extra-light-gray alt-font">Healthcare</p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div></div>
                        <div class="industries col-md-2 col-xs-6"><div class="text-center padding-eighteen-all feature-box-13 position-relative md-padding-ten-all sm-padding-25px-all xs-padding-eight-all">
                            <i class="ti-pie-chart ico text-custom-yellow icon-medium margin-15px-bottom xs-margin-10px-bottom"></i>
                            <p class="text-medium text-extra-light-gray alt-font">Private equity</p>
                            <!-- <div class="feature-box-overlay bg-deep-pink"></div> -->
                        </div></div>
                        <div class="industries col-md-2 col-xs-6"><div class="text-center padding-eighteen-all feature-box-13 position-relative md-padding-ten-all sm-padding-25px-all xs-padding-eight-all">
                            <i class="ti-music ico text-custom-yellow icon-medium margin-15px-bottom xs-margin-10px-bottom"></i>
                            <p class="text-medium text-extra-light-gray alt-font">Entertainment</p>
                            <div class="feature-box-overlay bg-deep-pink"></div>
                        </div></div>
                        <div class="industrie col-md-1"></div>
                    </div>


                </div>
            </div>
        </section>



        <?php include_once 'plugins/footer.php'?>
    </body>
</html>
