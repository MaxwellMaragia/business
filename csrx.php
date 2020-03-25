<?php
include_once 'functions/functions.php';
$sql = "SELECT value FROM general_settings WHERE name='csr'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$desc = $get_data['value'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <!-- title -->
    <title>CSR | five elements advisory</title>
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

<section class="wow fadeIn cover-background background-position-top margin-100px-top" style="background-image: url('images/hand-4806608_1920.jpg'); visibility: visible; animation-name: fadeIn;">
            <div class="opacity-medium bg-extra-dark-gray"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                        <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                            <!-- start sub title -->
                            <!-- <span class="text-white opacity6 alt-font margin-10px-bottom display-block text-small"><a href="index" class="text-white">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="index#services" class="text-white">Services</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Strategy and business process improvement </span> -->
                            <!-- end sub title -->
                            <!-- start page title -->
                            <h1 class="text-white alt-font font-weight-600 margin-10px-bottom">Corporate Social Responsibility</h1>
                            <!-- end page title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <div class="container">
                    <div class="row equalize sm-equalize-auto">
                        <div class="col-md-4 col-sm-12 col-xs-12 display-table sm-height-auto sm-margin-40px-bottom xs-margin-30px-bottom wow fadeIn" style="visibility: visible; animation-name: fadeIn; height: 447px;">
                            <div class="display-table-cell vertical-align-middle sm-text-center">
                              <i class="fas fa-quote-left text-deep-pink icon-large margin-15px-bottom"></i>
                              <h5 class="text-uppercase alt-font text-custom-blue font-weight-700 width-75 display-block no-margin-bottom md-width-90 sm-width-100 xs-width-100">Connect with yourself, discover your genius”</h5>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 display-table xs-margin-30px-bottom wow fadeIn" style="visibility: visible; animation-name: fadeIn; ">
                            <div class="display-table-cell vertical-align-middle">
                                <img class="padding-ten-right xs-no-padding-right sm-no-padding-right width-100" src="images/volunteer-1904498_1920.jpg" alt="" data-no-retina="">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 display-table xs-text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn; height: 447px;">
                            <div class="display-table-cell vertical-align-middle sm-padding-ten-left xs-no-padding-left">
                                <p class="text-large text-extra-dark-gray">We cannot be at peace with others unless we are at peace with ourselves. We cannot be at peace with ourselves unless we connect with ourselves.</p>
                                <p>
                                  FE Advisory supports the world wide mission of Sadguru Sadafaldeo Vihangam Yoga Sansthan (“SSDVYS”) that promotes use of Vihangam Yog life skills to re-establish self-connect and reinforce a life where virtues of self-restraint, respect, contentment, sense of gratitude and perseverance provides a rock solid foundation for anexhilarating and peaceful life. </p>
                                <p>
                                  Peace, Youth and Development are interlinked. Any societal progressive transformation requires transformation at individual level. A peaceful society provides enabling environment for progressive learnings to youths of the country.</p>
                                <!-- <a href="team-classic.html" class="alt-font text-uppercase font-weight-600 text-link-extra-dark-gray text-deep-pink-hover text-small">Our Creative People <i class="fas fa-long-arrow-alt-right margin-5px-left text-deep-pink text-medium position-relative top-2" aria-hidden="true"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="wow fadeIn bg-light-gray" style="visibility: visible; animation-name: fadeIn;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 hover-option4 margin-5px-bottom">
                        <div class="swiper-multy-row-container overflow-hidden swiper-container-horizontal">
                            <div class="swiper-wrapper" style="transform: translate3d(-1670px, 0px, 0px); transition-duration: 0ms;">
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-01.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-02.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="http://placehold.it/800x650" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-03.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="http://placehold.it/800x650" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-04.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="http://placehold.it/800x650" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item swiper-slide-prev" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-05.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="http://placehold.it/800x650" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item swiper-slide-active" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-06.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="http://placehold.it/800x650" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item swiper-slide-next" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-07.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="http://placehold.it/800x650" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-08.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="http://placehold.it/800x650" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-01.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="http://placehold.it/800x650" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                                <!-- start portfolio slider item -->
                                <div class="swiper-slide grid-item" style="width: 319px; margin-right: 15px;">
                                    <a href="single-project-page-02.html">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="http://placehold.it/800x650" alt="" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative last-paragraph-no-margin">
                                                            <span class="font-weight-600 line-height-normal alt-font text-white text-uppercase margin-5px-bottom display-block">Herbal Beauty Salon</span>
                                                            <p class="text-medium-gray text-uppercase text-extra-small">Branding and Identity</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                                <!-- end portfolio slider item -->
                            </div>
                            <!-- start slider pagination -->
                            <div class="swiper-portfolio-prev swiper-button-black-highlight"><i class="ti-arrow-left"></i></div>
                            <div class="swiper-portfolio-next swiper-button-black-highlight"><i class="ti-arrow-right"></i></div>
                            <!-- end slider pagination -->
                        </div>
                    </div>
                </div>
            </div>
            </section>

        <section class="no-padding wow fadeIn bg-white" id="services" style="visibility: visible; animation-name: fadeIn;">
            <div class="container-fluid no-padding">
                <div class="row equalize sm-equalize-auto no-margin">
                    <div class="col-md-6 col-sm-12 col-xs-12 display-table wow fadeIn last-paragraph-no-margin sm-text-center" style="visibility: visible; animation-name: fadeIn; height: 678px;">
                        <div class="display-table-cell vertical-align-middle padding-fifteen-all md-padding-ten-all xs-no-padding-lr xs-text-center">
                            <!-- <span class="text-medium margin-15px-bottom display-block alt-font text-deep-pink">We create premium designs and technology</span> -->
                            <!-- <h4 class="alt-font text-extra-dark-gray font-weight-600 sm-margin-lr-auto xs-width-100">we design brand, digital experience that engage the right customers.</h4> -->
                            <p class="width-80 md-width-100">An individual is the smallest unit of a society at large. We strongly believes that every societal challenge has its roots in human mind and therefore while we have to work relentlessly for the upliftment of mankind, we must not disregard the role of restless and fluctuating mind.</p>
                            <p>We have been actively engaged in organizing VY corporate yoga workshops and Yoga retreats for audiences from various spectrums of the society in Africa for last five years. The beginner workshop model shares scientific and easily implementable powerful yogic techniques to establish an equilibrium in energy flowbetween body, mind and soul. This 15 minutes of daily practice has proven to provideastounding benefits in terms of relentless focus, higher levels of productivity with reduced time, strong emotional balance & will-power and above all a great sense of peaceful being.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 position-relative sm-height-500px xs-height-300 cover-background wow fadeIn" style="background-image: url('images/hand-4806608_1920.jpg'); visibility: visible; animation-name: fadeIn; height: 678px;"></div>
                </div>
            </div>
        </section>







<!-- start footer -->
<?php include_once('plugins/footer.php') ?>
<!-- end footer -->


</body>
</html>
