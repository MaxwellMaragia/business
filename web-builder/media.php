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
                            <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom ">Media</h1>
                            <!-- end page title -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="wow fadeIn border-bottom border-color-extra-light-gray no-padding-bottom" style="visibility: visible; animation-name: fadeIn;">
            <div class="container-fluid">
                <div class="row text-center">
                  <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                      <div class="position-relative overflow-hidden width-100">
                          <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Image style</span>
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="filter-content overflow-hidden margin-100px-top sm-margin-70px-top xs-margin-50px-top xs-margin-15px-lr">
                        <ul class="portfolio-grid work-4col gutter-large hover-option6 lightbox-portfolio" style="position: relative; height: 756.218px;">
                            <li class="grid-sizer"></li>
                            <!-- start portfolio item -->
                            <li class="grid-item fadeInUp last-paragraph-no-margin" style="position: absolute; left: 0%; top: 0px; visibility: visible; animation-name: fadeInUp;">
                                <figure>
                                    <div class="portfolio-img bg-deep-pink position-relative text-center overflow-hidden">
                                        <img src="http://placehold.it/800x650" alt="" data-no-retina="">
                                        <div class="portfolio-icon">
                                            <a href="single-project-page-01.html"><i class="fas fa-link text-extra-dark-gray" aria-hidden="true"></i></a>
                                            <a class="gallery-link" title="Lightbox gallery image title..." href="http://placehold.it/800x650"><i class="fas fa-search text-extra-dark-gray" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <figcaption class="bg-white">
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <a href="single-project-page-01.html"><span class="line-height-normal font-weight-600 text-small alt-font margin-5px-bottom text-extra-dark-gray text-uppercase display-block">Herbal Beauty Salon</span></a>
                                                    <p class="text-medium-gray text-extra-small text-uppercase">Branding and Identity</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s" style="position: absolute; left: 25%; top: 0px; visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <figure>
                                    <div class="portfolio-img bg-deep-pink position-relative text-center overflow-hidden">
                                        <img src="http://placehold.it/800x650" alt="" data-no-retina="">
                                        <div class="portfolio-icon">
                                            <a href="single-project-page-02.html"><i class="fas fa-link text-extra-dark-gray" aria-hidden="true"></i></a>
                                            <a class="gallery-link" title="Lightbox gallery image title..." href="http://placehold.it/800x650"><i class="fas fa-search text-extra-dark-gray" aria-hidden="true"></i></a></div>
                                    </div>
                                    <figcaption class="bg-white">
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <a href="single-project-page-02.html"><span class="line-height-normal font-weight-600 text-small alt-font margin-5px-bottom text-extra-dark-gray text-uppercase display-block">Tailoring Interior</span></a>
                                                    <p class="text-medium-gray text-extra-small text-uppercase">Branding and Brochure</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s" style="position: absolute; left: 50%; top: 0px; visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <figure>
                                    <div class="portfolio-img bg-deep-pink position-relative text-center overflow-hidden">
                                        <img src="http://placehold.it/800x650" alt="" data-no-retina="">
                                        <div class="portfolio-icon">
                                            <a href="single-project-page-03.html"><i class="fas fa-link text-extra-dark-gray" aria-hidden="true"></i></a>
                                            <a class="gallery-link" title="Lightbox gallery image title..." href="http://placehold.it/800x650"><i class="fas fa-search text-extra-dark-gray" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <figcaption class="bg-white">
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <a href="single-project-page-03.html"><span class="line-height-normal font-weight-600 text-small alt-font margin-5px-bottom text-extra-dark-gray text-uppercase display-block">Designblast Inc</span></a>
                                                    <p class="text-medium-gray text-extra-small text-uppercase">Web and Photography</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s" style="position: absolute; left: 75%; top: 0px; visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                                <figure>
                                    <div class="portfolio-img bg-deep-pink position-relative text-center overflow-hidden">
                                        <img src="http://placehold.it/800x650" alt="" data-no-retina="">
                                        <div class="portfolio-icon">
                                            <a href="single-project-page-04.html"><i class="fas fa-link text-extra-dark-gray" aria-hidden="true"></i></a>
                                            <a class="gallery-link" title="Lightbox gallery image title..." href="http://placehold.it/800x650"><i class="fas fa-search text-extra-dark-gray" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <figcaption class="bg-white">
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <a href="single-project-page-04.html"><span class="line-height-normal font-weight-600 text-small alt-font margin-5px-bottom text-extra-dark-gray text-uppercase display-block">HardDot Stone</span></a>
                                                    <p class="text-medium-gray text-extra-small text-uppercase">Branding and Identity</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item fadeInUp last-paragraph-no-margin" style="position: absolute; left: 0%; top: 378.109px; visibility: visible; animation-name: fadeInUp;">
                                <figure>
                                    <div class="portfolio-img bg-deep-pink position-relative text-center overflow-hidden">
                                        <img src="http://placehold.it/800x650" alt="" data-no-retina="">
                                        <div class="portfolio-icon">
                                            <a href="single-project-page-05.html"><i class="fas fa-link text-extra-dark-gray" aria-hidden="true"></i></a>
                                            <a class="gallery-link" title="Lightbox gallery image title..." href="http://placehold.it/800x650"><i class="fas fa-search text-extra-dark-gray" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <figcaption class="bg-white">
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <a href="single-project-page-05.html"><span class="line-height-normal font-weight-600 text-small alt-font margin-5px-bottom text-extra-dark-gray text-uppercase display-block">Crop Identity</span></a>
                                                    <p class="text-medium-gray text-extra-small text-uppercase">Branding and Brochure</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s" style="position: absolute; left: 25%; top: 378.109px; visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <figure>
                                    <div class="portfolio-img bg-deep-pink position-relative text-center overflow-hidden">
                                        <img src="http://placehold.it/800x650" alt="" data-no-retina="">
                                        <div class="portfolio-icon">
                                            <a href="single-project-page-06.html"><i class="fas fa-link text-extra-dark-gray" aria-hidden="true"></i></a>
                                            <a class="gallery-link" title="Lightbox gallery image title..." href="http://placehold.it/800x650"><i class="fas fa-search text-extra-dark-gray" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <figcaption class="bg-white">
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <a href="single-project-page-06.html"><span class="line-height-normal font-weight-600 text-small alt-font margin-5px-bottom text-extra-dark-gray text-uppercase display-block">Violator Series</span></a>
                                                    <p class="text-medium-gray text-extra-small text-uppercase">Web and Photography</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s" style="position: absolute; left: 50%; top: 378.109px; visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <figure>
                                    <div class="portfolio-img bg-deep-pink position-relative text-center overflow-hidden">
                                        <img src="http://placehold.it/800x650" alt="" data-no-retina="">
                                        <div class="portfolio-icon">
                                            <a href="single-project-page-07.html"><i class="fas fa-link text-extra-dark-gray" aria-hidden="true"></i></a>
                                            <a class="gallery-link" title="Lightbox gallery image title..." href="http://placehold.it/800x650"><i class="fas fa-search text-extra-dark-gray" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <figcaption class="bg-white">
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <a href="single-project-page-07.html"><span class="line-height-normal font-weight-600 text-small alt-font margin-5px-bottom text-extra-dark-gray text-uppercase display-block">Jeremy Dupont</span></a>
                                                    <p class="text-medium-gray text-extra-small text-uppercase">Branding and Identity</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end portfolio item -->
                            <!-- start portfolio item -->
                            <li class="grid-item fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s" style="position: absolute; left: 75%; top: 378.109px; visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                                <figure>
                                    <div class="portfolio-img bg-deep-pink position-relative text-center overflow-hidden">
                                        <img src="http://placehold.it/800x650" alt="" data-no-retina="">
                                        <div class="portfolio-icon">
                                            <a href="single-project-page-08.html"><i class="fas fa-link text-extra-dark-gray" aria-hidden="true"></i></a>
                                            <a class="gallery-link" title="Lightbox gallery image title..." href="http://placehold.it/800x650"><i class="fas fa-search text-extra-dark-gray" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <figcaption class="bg-white">
                                        <div class="portfolio-hover-main text-center">
                                            <div class="portfolio-hover-box vertical-align-middle">
                                                <div class="portfolio-hover-content position-relative">
                                                    <a href="single-project-page-08.html"><span class="line-height-normal font-weight-600 text-small alt-font margin-5px-bottom text-extra-dark-gray text-uppercase display-block">Bill Gardner</span></a>
                                                    <p class="text-medium-gray text-extra-small text-uppercase">Web and Photography</p>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <!-- end portfolio item -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>


    </body>
</html>
